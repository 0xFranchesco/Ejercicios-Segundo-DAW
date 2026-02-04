<?php

namespace App\Jobs;

use App\Models\Conversation;
use App\Models\Message;
use App\Services\AristotelesAI;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateAiReply implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    

    public function __construct(
        public int $conversationId,
        public int $placeholderMessageId,
    ) {}

    public function handle(AristotelesAI $ai): void
    {

        $conversation = Conversation::findOrFail($this->conversationId);

        $placeholder = Message::where('id', $this->placeholderMessageId)
            ->where('conversation_id', $conversation->id)
            ->firstOrFail();

        try {
        $messages = $conversation->messages()
            ->where('id', '<', $placeholder->id)
            ->orderBy('id')
            ->get()
            ->map(fn($m) => [
                'role' => $m->role,
                'content' => $m->content,
            ])
            ->toArray();

        $reply = $ai->chat($messages, murciano: (bool) $conversation->murciano);

        $placeholder->update([
            'content' => $reply,
        ]);

        $conversation->touch();
        
    }catch (\Throwable $e) {
        \Log::error('GenerateAiReply failed', [
            'conversation_id' => $conversation->id,
            'murciano' => (bool) $conversation->murciano,
            'error' => $e->getMessage(),
        ]);

        $placeholder->update([
            'content' => " Se ha caido la respuesta (modo murciano). Reintenta o apágalo.\n\n".$e->getMessage(),
        ]);
}
    }
}
