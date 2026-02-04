<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('chat', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full p-2" type="email" name="email" style="color: white;" required autofocus autocomplete="username"  placeholder="Type your email here..."/>
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
       <div class="mt-4" x-data="{ show: false }">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative mt-1">
        <x-text-input
            wire:model="form.password"
            id="password"
            name="password"
            x-bind:type="show ? 'text' : 'password'"
            class="block w-full p-2 pr-12"
            required
            autocomplete="current-password"
            placeholder="(Min-8, Max-20)"
            style="color: white;"
        />

        <!-- BOTÓN OJO -->
        <button
            type="button"
            @click="show = !show"
            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-white"
            aria-label="Toggle password visibility"
        >
            <!-- Ojo abierto -->
            <img
                x-show="!show"
                x-cloak
                src="/ojoAbierto.png"
                class="w-5 h-5 transition-transform duration-200"
            />

            <!-- Ojo cerrado -->
            <img
                x-show="show"
                x-cloak
                src="/ojoCerrado.png"
                class="w-5 h-5 transition-transform duration-200 rotate-180"
            />
        </button>
    </div>

    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
</div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-white-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
                 <a class="ps-5 pe-4 flex justify-start underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}" wire:navigate>
                    {{ __('Register') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
               
        </div>
        
    </form>
</div>
