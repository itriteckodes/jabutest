<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Task</title>

        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('scripts')
    </head>

    <body class="antialiased">
        <x-notifications z-index="z-50" />
        {{ $slot }}
        @livewireScripts

    </body>
</html>
