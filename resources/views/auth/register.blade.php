@extends('layouts.app')

@section('test')
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="username" :value="__('Name')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="firstName" :value="__('firstName')" />
                <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="lastName" :value="__('lastName')" />
                <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" :value="__('email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="phone" :value="__('phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password" :value="__('password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="text" name="password" :value="old('password')" required autofocus autocomplete="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <input type="hidden" name="userStatus" value="0">
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

@endsection
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
