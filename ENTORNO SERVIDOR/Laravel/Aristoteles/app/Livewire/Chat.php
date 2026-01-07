<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AristotelesAI;
use App\Models\Conversation;
use App\Models\Message;
use App\Jobs\GenerateAiReply;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Chat extends Component
{
    public ?Conversation $conversation = null;
    public string $message = '';
    public bool $hasPending = false;
    public bool $sidebarOpen = false;
    public bool $modoMurciano = false;

    private function guestId(): string
    {
        return request()->attributes->get('guest_id')
        ?? request()->cookie('guest_id')
        ?? (string) Str::uuid();
    }

    public function mount(): void
    {

        if (Auth::check()) {
            $this->conversation = Conversation::where('user_id', Auth::id())
            ->latest('updated_at')
            ->first();
        }else {
            $gid = $this->guestId();
            $this->conversation = Conversation::whereNull('user_id')
            ->where('guest_id', $gid)
            ->latest('updated_at')
            ->first();        
        }

        if (!$this->conversation) {
            $this->newChat();
        }

        $this->refreshMessages();

        $this->modoMurciano = (bool) ($this->conversation?->murciano ?? false);

    }

    public function newChat(): void
    {

        $data = ['title' => null];

        if (Auth::check()) {
               $data['user_id'] = Auth::id();
               $data['guest_id'] = null;
        }else {
                $data['user_id'] = null;
                $data['guest_id'] = $this->guestId();
        }

        $this->conversation = Conversation::create($data);

        $this->message = '';
        
        $this->modoMurciano = (bool) $this->conversation->murciano; 

    }

    public function openChat(int $conversationId): void
    {

        $query = Conversation::where('id', $conversationId);

        if (Auth::check()) {
            $query->where('user_id', Auth::id());
        }else {
            $query->whereNull('user_id')->where('guest_id', $this->guestId());
        }

        $this->conversation = $query->firstOrFail();

        $this->message = '';

        $this->modoMurciano = (bool) $this->conversation->murciano;

    }

    public function toggleSidebar(): void
    {
        $this->sidebarOpen = !$this->sidebarOpen;
    }

    public function toggleMurciano(): void
    {
        if (!$this->conversation) return;

    $this->modoMurciano = !$this->modoMurciano;

    $query = Conversation::where('id', $this->conversation->id);

    if (Auth::check()) {
        $query->where('user_id', Auth::id());    
    }else {
        $query->whereNull('user_id')
              ->where('guest_id', $this->guestId());
    }

    $query->update(['murciano' => $this->modoMurciano]);

    $this->conversation->refresh(); 

    }

    public function send(AristotelesAI $ai): void
    {

        if (!$this->conversation) {
            $this->newChat();
        }

        $query = Conversation::whereKey($this->conversation->id);

        if (!Auth::check()) {
           $query->where('user_id', Auth::id());
        }elseif (Auth::check()) {
            $query->where('user_id', Auth::id());
        }else {
           $query->whereNull('user_id')
                 ->where('guest_id', $this->guestId());     
        }
        
        $this->conversation = $query->firstOrFail();

        $key = Auth::check()
        ? "ai-messages:user:" . Auth::id()
        : "ai-messages:guest:" . $this->guestId();
        $max = 10;
        $decaySeconds = 60 * 60 * 24;

        if (RateLimiter::tooManyAttempts($key, $max)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = (int) ceil($seconds / 60);
            $hours = (int) ceil($minutes / 60);

            $this->addError('message', "Límite alcanzado de 10 mensajes por día. Vuelve a intentarlo en {$minutes} mins o {$hours} horas.");
            return;
        } 
        
        $this->validate([
            'message' => 'required|string|max:2000',
        ]);

        RateLimiter::hit($key, $decaySeconds);

        $content = trim($this->message);

        $this->conversation->messages()->create([
            'role' => 'user',
            'content' => $content,
        ]);

        if (empty($this->conversation->title)) {
            $this->conversation->update([
                'title' => str($content)->limit(40)->toString(),
            ]);
        }

        $placeholder = $this->conversation->messages()->create([
            'role' => 'assistant',
            'content' => '...',
        ]);

        $this->hasPending = true;
        $this->message = '';

        GenerateAiReply::dispatch($this->conversation->id, $placeholder->id);

        $this->conversation->refresh();
        $this->dispatch('chat-sent');
    }

    public function render()
    {

        if (Auth::check()) {
            $conversations = Conversation::where('user_id', Auth::id())
                ->latest('updated_at')
                ->get();
        }else {
            $conversations = Conversation::whereNull('guest_id')
            ->where('guest_id', $this->guestId())
            ->latest('updated_at')
            ->get();
        }

        $messages = $this->conversation
            ? $this->conversation->messages()->orderBy('id')->get()
            : collect();

        return view('livewire.chat', [
            'conversations' => $conversations,
            'messages' => $messages,
        ]);
    }

    public function clearChat(): void
    {

        $this->conversation->messages()->delete();

        $this->reset('message');

        $this->dispatch('chat-sent');
    }

    public function refreshMessages(): void
    {

        $this->hasPending = $this->conversation
            ? $this->conversation->messages()
            ->where('role', 'assistant')
            ->where('content', '...')
            ->exists()
            : false;

        $this->conversation?->refresh();
    }

    public function deleteChat(int $conversationId): void
    {

        $conv = Conversation::where('id', $conversationId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $conv->messages()->delete();
        $conv->delete();

        if ($this->conversation?->id === $conversationId) {
            $this->conversation = \App\Models\Conversation::where('user_id', auth()->id())
                ->latest()
                ->first();

            if (!$this->conversation) {
                $this->conversation = Conversation::create([
                    'user_id' => auth()->id(),
                    'title' => null,
                ]);
            }
        }
    }
}
