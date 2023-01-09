<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;800&display=swap">

        {{-- aos --}}
        {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased flex flex-col">
        <div class="min-h-screen bg-white">
        <div class="{{ request()->routeIs('home') ? 'bg-cover bg-bottom bg-fixed bg-hero-image' : '' }}" >
                @include('layouts.navigation')

                @isset($hero)
                    <x-container>
                        {{ $hero }}
                    </x-container>
                @endisset
            </div>

            <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

            <!-- Page Content -->
            <main>
                <x-container>
                    {{ $slot }}
                </x-container>
            </main>

            @include('layouts.footer')

        </div>
        <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

        {{-- aos --}}
        {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script> --}}
</script>
    </body>
</html>
