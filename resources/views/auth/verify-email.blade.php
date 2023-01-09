<x-guest-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="grid place-items-center lg:h-screen">
            <div class="shadow-md py-10 px-8 rounded border border-orange-400">
                    <div class="mb-4 text-sm text-slate-900">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>
                
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
                
                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                
                            <div>
                                <x-primary-button>
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </div>
                        </form>
                
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                
                            <button type="submit" class="underline text-sm text-slate-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</x-guest-layout>
