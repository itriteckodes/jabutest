<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <wireui:scripts />
    <x-notifications />
    @vite('resources/css/app.css')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>

<body class="h-full font-mont bg-white antialiased flex flex-col h-screen">

    @include('layout.header')
    <main class="relative bg-white px-8 py-4">
            {{ $slot }}
    </main>
    @livewireScripts
    @stack('scripts')

</body>

</html>
