<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky full-width>
 
        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
 
            {{-- Brand --}}
            <a href="/"> <x-icon name="fas.search-location" class="w-9 h-9 text-2xl text-blue-500" label="Job Search"  /> </a>
        </x-slot:brand>
 
        {{-- Right side actions --}}
        <x-slot:actions>
            <x-button label="Messages" icon="s-envelope" link="###" class="btn-ghost btn-sm text-green-500" responsive />
            <x-button label="Notifications" icon="s-bell" link="###" class="btn-ghost btn-sm text-yellow-500" responsive />
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
    <footer class="footer footer-center bg-base-300 text-base-content p-4">
        <aside>
            <p>Copyright © 2023 - All right reserved</p>
        </aside>
    </footer>
    {{--  TOAST area --}}
    <x-toast />
</body>
</html>