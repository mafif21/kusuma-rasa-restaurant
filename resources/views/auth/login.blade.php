<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="grid lg:grid-cols-2 items-center">
        <div class=" flex flex-col items-center w-full">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-64 h-64">
            </div>

            <div class="lg:w-3/5">
                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Remember Me -->
                    <div class="flex items-center mt-4 justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-xs lg:text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
            
                        @if (Route::has('password.request'))
                            <a class="underline text-xs lg:text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
            
                    <div class="flex  items-center justify-end mt-4">
                        @if (Route::has('register'))
                            <small class="text-xs lg:text-sm">Dont have account?</small> &nbsp;
                            <a class="text-decoration-none text-xs lg:text-sm text-orange-600 hover:font-semibold rounded-md focus:outline-none" href="{{ route('register') }}">
                            {{ __('Register') }}
                            </a>
                        @endif
                        <x-primary-button class="ml-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-5 lg:block hidden">
            <img src="{{ asset('images/starter/login.jpg') }}" alt="login" class="rounded-lg w-full">
        </div>
    </div>
</x-guest-layout>
