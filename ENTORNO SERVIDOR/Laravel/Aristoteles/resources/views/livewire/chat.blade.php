@php
    use Illuminate\Support\Str;
@endphp

<div class="fixed inset-0 flex bg-gray-900 text-gray-100 overflow-hidden">

    <!-- Sidebar (bar de al lado) -->
    <aside
        class="{{ $sidebarOpen ? 'w-52 border-r border-gray-700' : 'w-0' }} shrink-0 overflow-hidden bg-gray-800
     transition-[width] duration-300 ease-in-out flex flex-col fixed md:relative left-0 top-0 bottom-0 z-40"
        id="sidebar">

        @if (Auth::check())
            
        <!--Aqui esta para crear un nuevo chgat-->
        <div class="p-4 border-b border-gray-700 flex-shrink-0">
            <button wire:click="newChat" type="button"
                class="w-full bg-gray-700 hover:bg-gray-600 text-white rounded-lg p-3 flex items-center justify-center gap-2 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Chat
            </button>
        </div>
        
        @endif

        <!--Aqui estan tos los chats-->
        <div class="flex-1 overflow-y-auto py-4 space-y-2" style="-webkit-overflow-scrolling: touch;">
            @foreach ($conversations as $c)
                <div
                    class="relative px-3 py-2 rounded-lg mx-2 transition-colors
    {{ $conversation && $conversation->id === $c->id ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    <div class="flex items-start gap-2">
                        <button type="button" class="min-w-0 flex-1 text-left"
                            wire:click="openChat({{ $c->id }})">
                            <div class="text-sm font-medium truncate">
                                {{ $c->title ?: 'New Chat' }}
                            </div>
                            <div class="text-xs text-gray-400 truncate">
                                {{ optional($c->messages()->latest('id')->first())->content ?? 'No messages yet…' }}
                            </div>
                        </button>

                        <button type="button" class="p-1 rounded-md hover:bg-gray-600 text-gray-300"
                            data-chat-menu-button="{{ $c->id }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <div class="hidden absolute right-2 top-10 w-44 bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden z-50"
                        data-chat-menu="{{ $c->id }}" wire:click.stop>
                        <button type="button"
                            class="w-full text-left px-4 py-2 text-sm hover:bg-gray-700 text-red-500"
                            wire:click="deleteChat({{ $c->id }})">
                            Eliminar chat
                        </button>
                    </div>
                </div>
            @endforeach

        </div>

        @if (Auth::check())
             <div class="p-6 border-t border-gray-700 flex-shrink-0">
            <div class="relative" x-data="{ open: false }">
                <button type="button" @click="open = !open"
                    class="w-full flex items-center gap-3 hover:bg-gray-700 p-2 rounded-lg transition-colors">

                    <div class="text-left flex-1">
                        <div class="text-sm font-medium">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-400">Settings</div>
                    </div>

                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>

                <div x-show="open" @click.outside="open = false" x-transition
                    class="absolute bottom-14 left-0 w-full bg-gray-800 border border-gray-700 rounded-lg shadow-lg overflow-hidden z-50"
                    style="display:none;">
                    <a href="{{ route('profile') }}"
                        class="block px-4 py-3 text-sm hover:bg-gray-700 transition-colors">
                        Settings
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-3 text-sm hover:bg-gray-700 transition-colors">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div> 
        @else
            <div class="p-6 border-t border-gray-700 space-y-2">
    <a href="{{ route('login') }}" class="block w-full text-center bg-gray-700 hover:bg-gray-600 rounded-lg p-2">
      Iniciar sesión
    </a>
    <a href="{{ route('register') }}" class="block w-full text-center bg-blue-600 hover:bg-blue-500 rounded-lg p-2">
      Registrarse
    </a>
    <p class="text-xs text-gray-400">
      Inicia sesión para guardar tus chats.
    </p>
  </div> 
        @endif
        
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 relative">

        <!-- Header -->
        <header class="h-14 md:h-16 border-b border-gray-800 flex items-center justify-between px-3 md:px-6 flex-shrink-0 bg-gray-900">
            <button wire:click="toggleSidebar" class="p-2 hover:bg-gray-800 rounded-lg transition-colors"
                type="button">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-base md:text-xl font-semibold truncate px-2">
                {{ $conversation?->title ?? 'Current Chat' }}
            </h1>
            <div class="relative">

                <button class="p-2 hover:bg-gray-800 rounded-lg transition-colors" type="button" id="chatMenuButton">
                    <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                        </path>
                    </svg>
                </button>

                <div id="chatMenu"
                    class="hidden absolute right-0 mt-2 w-44 bg-gray-800 border border-gray-700 rounded-lg shadow-lg z-50">
                    <button wire:click="clearChat" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-700">
                        Limpiar chat
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-700">
                            Denunciar
                        </button>
                    </form>

                    <button wire:click="toggleMurciano"
                        class="ml-4 mb-4 mt-1 px-2 py-3 rounded-full text-sm font-medium transition
                        {{ $modoMurciano ? 'bg-blue-500 text-black' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' }}"
                        type="button">
                        {{ $modoMurciano ? 'Apagar Modo Murciano' : 'Activar Modo Murciano' }}
                    </button>
                </div>
            </div>
        </header>


        <!-- Los mensajicos -->
        <div id="messages" @if ($hasPending) wire:poll.1s="refreshMessages" @endif
            class="flex-1 overflow-y-auto overflow-x-hidden p-3 md:p-6 space-y-4 md:space-y-6"
            style="-webkit-overflow-scrolling: touch; overscroll-behavior-y: contain;">

            @forelse($messages as $m)
                @if ($m->role === 'assistant')
                    <div class="flex items-start gap-2 md:gap-4 max-w-3xl">
                        <div class="flex-1 min-w-0">
                            <div class="bg-gray-800 rounded-lg p-3 md:p-4 break-words">
                                @if ($m->content === '...')
                                    <span class="animate-pulse">...</span>
                                @else
                                    <div class="prose prose-invert prose-sm md:prose-base max-w-none overflow-hidden">
                                        {!! Str::markdown($m->content) !!}
                                    </div>
                                @endif
                            </div>
                            <div class="text-xs text-gray-500 mt-1">
                                {{ $m->created_at->format('H:i') }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex items-start gap-2 md:gap-4 max-w-3xl ml-auto">
                        <div class="flex-1 min-w-0">
                            <div class="bg-blue-600 rounded-lg p-3 md:p-4 break-words">
                                <p class="whitespace-pre-wrap text-sm md:text-base">{{ $m->content }}</p>
                            </div>
                            <div class="text-xs text-gray-500 mt-1 text-right">
                                {{ $m->created_at->format('H:i') }}
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="text-gray-400 text-center pt-12 md:pt-24 px-4">
                    <div class="text-xl md:text-2xl font-semibold">New Chat</div>
                    <div class="text-sm mt-2">Welcome to Aristóteles IA, Type your first message below.</div>
                </div>
            @endforelse

            @error('message')
                <div class="text-sm text-red-400 px-4">{{ $message }}</div>
            @enderror

            <!-- Espaciador para que el último mensaje no quede pegado al input -->
            <div class="h-4"></div>

        </div>

        <!-- Input Area (donde escribes tt) -->
        <div class="border-t border-gray-800 bg-gray-900 flex-shrink-0" 
             style="padding-bottom: env(safe-area-inset-bottom, 0px);">
            <div class="max-w-3xl mx-auto px-3 md:px-6 py-3 md:py-4">
                <form wire:submit.prevent="send" class="relative">
                    <textarea id="composer" wire:model.defer="message"
                        class="w-full bg-gray-800 rounded-lg pl-3 md:pl-4 pr-10 md:pr-12 py-2 md:py-3 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none text-[16px]"
                        rows="1" placeholder="Type your message..."></textarea>

                    <button type="submit"
                        class="absolute right-2 bottom-2 p-2 text-blue-500 hover:bg-gray-700 rounded-lg transition-colors"
                        style="touch-action: manipulation;">
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Footer (el big foot, o pie de pagina) -->
            <div class="text-gray-400 text-center pb-2 px-4">
                <div class="text-xs md:text-sm">
                    Aristóteles puede cometer errores. Considera verificar la información importante.
                    <a href="/info" class="text-blue-400 hover:text-blue-300">Más información</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Overlay para cerrar sidebar en móvil -->
    @if($sidebarOpen)
        <div class="fixed inset-0 bg-black/50 z-30 md:hidden" wire:click="toggleSidebar"></div>
    @endif

</div>

@push('styles')
    <style>
        * {
            -webkit-tap-highlight-color: transparent;
        }

        html, body {
            height: 100%;
            overflow: hidden;
            position: fixed;
            width: 100%;
        }

        /* Prevenir zoom en iOS */
        input, textarea, select {
            font-size: 16px !important;
        }

        /* Mejorar prose en móvil */
        @media (max-width: 768px) {
            .prose {
                font-size: 0.875rem;
                line-height: 1.5;
            }
            
            .prose p {
                margin-top: 0.5em;
                margin-bottom: 0.5em;
            }
            
            .prose ul, .prose ol {
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                padding-left: 1.5em;
            }

            .prose li {
                margin-top: 0.25em;
                margin-bottom: 0.25em;
            }

            .prose code {
                font-size: 0.8em;
            }

            .prose pre {
                font-size: 0.75rem;
                overflow-x: auto;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {

            const getWireComponent = (el) => {
                const root = el?.closest('[wire\\:id]');
                const wireId = root?.getAttribute('wire:id');
                return wireId ? Livewire.find(wireId) : null;
            };

            const scrollBottom = (smooth = false) => {
                const box = document.getElementById('messages');
                if (!box) return;
                
                requestAnimationFrame(() => {
                    if (smooth) {
                        box.scrollTo({
                            top: box.scrollHeight,
                            behavior: 'smooth'
                        });
                    } else {
                        box.scrollTop = box.scrollHeight;
                    }
                });
            };

            const bindEnterToSend = () => {
                const ta = document.getElementById('composer');
                if (!ta) return;

                if (ta.dataset.boundEnter === '1') return;
                ta.dataset.boundEnter = '1';

                ta.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        const component = getWireComponent(ta);
                        component?.call('send');
                        ta.value = '';
                        ta.style.height = 'auto';
                    }
                });

                // Auto-resize
                ta.addEventListener('input', () => {
                    ta.style.height = 'auto';
                    const newHeight = Math.min(ta.scrollHeight, 120);
                    ta.style.height = newHeight + 'px';
                });

                // Prevenir comportamientos extraños en iOS
                ta.addEventListener('focus', () => {
                    document.body.style.position = 'fixed';
                    setTimeout(() => {
                        document.body.style.position = '';
                    }, 300);
                });
            };

            const bindAll = () => {
                bindEnterToSend();
            };

            bindAll();
            setTimeout(() => scrollBottom(false), 100);

            Livewire.hook('message.processed', () => {
                bindAll();
                setTimeout(() => scrollBottom(true), 100);
            });

            Livewire.on('chat-sent', () => {
                setTimeout(() => scrollBottom(true), 150);
            });
        });

        // Chat menu
        const chatMenuBtn = document.getElementById('chatMenuButton');
        const chatMenu = document.getElementById('chatMenu');

        if (chatMenuBtn && chatMenu) {
            chatMenuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                chatMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', () => {
                chatMenu.classList.add('hidden');
            });

            chatMenu.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

        // Chat menus individuales
        const closeAllChatMenus = () => {
            document.querySelectorAll('[data-chat-menu]').forEach(m => m.classList.add('hidden'));
        };

        document.addEventListener('click', () => closeAllChatMenus(), true);

        document.addEventListener('click', (e) => {
            const btn = e.target.closest('[data-chat-menu-button]');
            if (!btn) return;

            e.preventDefault();
            e.stopPropagation();

            const id = btn.getAttribute('data-chat-menu-button');
            const menu = document.querySelector(`[data-chat-menu="${id}"]`);
            if (!menu) return;

            const wasHidden = menu.classList.contains('hidden');
            closeAllChatMenus();
            if (wasHidden) menu.classList.remove('hidden');
        }, true);

        Livewire.hook('message.processed', () => closeAllChatMenus());

        Livewire.on('composer-clear', () => {
            const ta = document.getElementById('composer');
            if (ta) {
                ta.value = '';
                ta.style.height = 'auto';
            }
        });
    </script>
@endpush