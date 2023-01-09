<x-guest-layout>
    <x-slot name="title">Register</x-slot>

    <!-- Session Status -->
    @if (session()->has('status'))
        <x-success-alert statusText="{{ session('status') }}"></x-success-alert>
    @endif

    <div class="grid lg:grid-cols-2 items-center">
        <div class=" flex flex-col items-center w-full">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-64 h-64">
            </div>

            <div class="lg:w-3/5">
                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf
            
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <small class="text-xs lg:text-sm">Already have account?</small> &nbsp;
                        <a class="text-decoration-none text-xs lg:text-sm text-orange-600 hover:font-semibold rounded-md focus:outline-none" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-5 hidden lg:block">
            <img src="{{ asset('images/starter/login.jpg') }}" alt="login" class="rounded-lg w-full">
        </div>
    </div>
</x-guest-layout>

