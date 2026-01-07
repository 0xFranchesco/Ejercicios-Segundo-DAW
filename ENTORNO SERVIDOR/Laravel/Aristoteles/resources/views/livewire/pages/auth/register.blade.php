<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('login', absolute: false), navigate: true);
        
    }
}; ?>

<div>
    <form wire:submit="register">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full p-2" type="text" name="name" required autofocus autocomplete="name" style="color: white;" placeholder="Type your name here..." />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full p-2" type="email" name="email" required autocomplete="username" style="color: white;" placeholder="Type your email here..."/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4" x-data="{ show: false }">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative mt-1">
        <x-text-input
            wire:model="password"
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

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
       <div class="mt-4" x-data="{ show: false }">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

    <div class="relative mt-1">
        <x-text-input
            wire:model="password_confirmation"
            id="password_confirmation"
            name="password_confirmation"
            x-bind:type="show ? 'text' : 'password'"
            class="block w-full p-2 pr-12"
            required
            autocomplete="new-password"
            placeholder="Repeat password"
            style="color: white;"
        />

        <button
            type="button"
            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-800"
            @click="show = !show"
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
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
