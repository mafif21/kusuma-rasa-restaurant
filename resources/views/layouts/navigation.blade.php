<nav x-data="{ open: false }" class="{{ request()->routeIs('home') ? 'text-white bg-transparent' : 'bg-white text-slate-900' }} py-2">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center font-semibold text-xl">
                    <a href="{{ route('home') }}">
                        Kusuma Rasa
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('food.index')" :active="request()->routeIs('food.index')">
                        {{ __('Menu') }}
                    </x-nav-link>
                    <x-nav-link :href="route('booking.step.one')" :active="request()->routeIs('booking.step.one')">
                        {{ __('Reservation') }}
                    </x-nav-link>
                    
                    @isset(auth()->user()->is_admin)
                        @if (auth()->user()->is_admin)
                        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                            {{ __('Admin') }}
                        </x-nav-link>
                        @endif
                    @endisset
                </div>
            </div>

            @auth
                <!-- Settings Dropdown -->
                <div class="flex items-center">
                    <a href="{{ route('cart.index') }}" class="hidden lg:block lg:flex gap-x-2 items-center font-semibold {{ request()->routeIs('home') ? 'hidden' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/></svg>
                        {{ Gloudemans\Shoppingcart\Facades\Cart::count() }} Items
                    </a>
                    
                    <div class="sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-5 py-3 border border-transparent text-sm leading-4 font-medium rounded-md {{ request()->routeIs('home') ? 'backdrop-blur-md text-gray-200 hover:text-white' : 'text-slate-900 font-semibold opacity-50 hover:opacity-100' }} transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
    
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
    
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('food.index')">
                                    {{ __('Menu') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('booking.step.one')">
                                    {{ __('Reservation') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('cart.index')">
                                    {{ __('Cart ') }}
                                </x-dropdown-link>
    
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
    
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

                @else
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                </div>
            @endauth
            

        </div>
    </div>
</nav>
