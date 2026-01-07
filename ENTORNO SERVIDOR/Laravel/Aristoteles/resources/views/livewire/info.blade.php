<div class="bg-gray-800 text-gray-100" style="min-height: 100vh; overflow-y: auto; -webkit-overflow-scrolling: touch;">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 py-14 pb-20">
        <div class="text-center">
            <h1 class="text-white text-3xl sm:text-5xl font-bold md:text-6xl">
                More info about <span class="text-blue-400">Aristóteles AI</span>
            </h1>

            <p class="mt-5 text-base sm:text-lg text-gray-300 leading-relaxed">
                Aristóteles AI is a chat-style assistant built to help users think clearly, learn faster, and get things done.
                It combines a modern interface with AI responses, chat history, and practical safeguards like rate limits.
            </p>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2">
            <div class="rounded-2xl bg-gray-900/40 border border-gray-700 p-6">
                <h2 class="text-lg font-semibold text-white">What you can do</h2>
                <ul class="mt-4 space-y-2 text-gray-300">
                    <li>• Create multiple chats and keep them organized</li>
                    <li>• Get AI replies with Markdown formatting</li>
                    <li>• See messages instantly and "…" while the AI is thinking</li>
                    <li>• Email verification to reduce fake accounts</li>
                    <li>• Daily message limit to prevent abuse</li>
                </ul>
            </div>

            <div class="rounded-2xl bg-gray-900/40 border border-gray-700 p-6">
                <h2 class="text-lg font-semibold text-white">How it's built</h2>
                <ul class="mt-4 space-y-2 text-gray-300">
                    <li>• Laravel + Breeze for auth and verification</li>
                    <li>• Livewire for real-time UI</li>
                    <li>• TailwindCSS for styling</li>
                    <li>• Local AI support (Ollama) during development</li>
                    <li>• Mail testing via local mail inbox (Mailpit)</li>
                </ul>
            </div>
        </div>

        <div class="mt-6 rounded-2xl bg-gray-900/40 border border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-white">About the creator</h2>
            <p class="mt-3 text-gray-300 leading-relaxed">
                This project was created by <span class="font-semibold text-white">Francisco José Castaño Ruiz</span>,
                currently finishing <span class="font-semibold text-white">2nd year of DAW</span>.
                Aristóteles AI is part of a hands-on learning journey focused on building real projects end-to-end:
                frontend, backend, authentication, and deployment.
            </p>
        </div>

        <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('register') }}"
               class="inline-flex items-center justify-center rounded-xl bg-blue-500 px-10 py-3 font-semibold text-white hover:bg-blue-600 transition">
                Create an account
            </a>

            <a href="{{ route('login') }}"
               class="inline-flex items-center justify-center rounded-xl bg-gray-700 px-7 py-3 font-semibold text-white hover:bg-gray-600 transition">
                Log in
            </a>

            <a href="/"
               class="inline-flex items-center justify-center rounded-xl border border-gray-600 px-8 py-3 font-semibold text-gray-200 hover:bg-gray-700 transition">
                Back to home
            </a>
        </div>

        <!-- Espaciador extra para iOS Safari -->
        <div class="h-8" style="padding-bottom: env(safe-area-inset-bottom, 0px);"></div>
    </div>
</div>

@push('styles')
<style>
    /* Fix para scroll en iOS */
    html {
        height: 100%;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
    }

    body {
        min-height: 100%;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Prevenir zoom en iOS si hay inputs */
    input, textarea, select {
        font-size: 16px !important;
    }
</style>
@endpush