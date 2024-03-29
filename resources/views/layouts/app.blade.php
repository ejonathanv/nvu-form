<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="min-h-screen bg-cover bg-no-repeat bg-center bg-fixed" style="background-image: url({{ asset('img/pexels-mike-tyurin-5534734.jpg') }})">
                {{ $slot }}
                <footer class="py-16 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-white font-bold text-xs">
                        &copy; {{ date('Y') }} Oportunidades de Éxito
                    </p>
                </footer>
            </main>

        </div>
    </body>
</html>
