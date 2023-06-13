<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tic Tac Toe {{ isset($title) ? ' | ' . $title : '' }}</title>

        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100 p-12">
        <div class="bg-gray-100 container mx-auto max-w-2xl text-slate-600">
            <h1 class="text-7xl text-slate-700 text-center font-semibold mb-4">Tic Tac Toe</h1>
            {{ $slot }}
        </div>
        @livewireScripts
    </body>
</html>