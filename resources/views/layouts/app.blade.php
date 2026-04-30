<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'NBA Player Management' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <nav class = "max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >
            <div class = "flex items-center justify-between h-16" >
                <div class = "flex items-center" >
                    <h1 class = "text-xl font-bold text-gray-800" >NBA Player Management</h1>
                </div>
                <div class = "flex items-center" >
                    <a href="" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Players</a>
                    <a href="" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Teams</a>
                </div>
        </nav>

        <main class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        @livewireScripts
    </body>
</html>
