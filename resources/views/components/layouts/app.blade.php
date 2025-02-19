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
            <a href="/home"> <x-icon name="fas.search-location" class="w-9 h-9 text-2xl text-blue-500" label="Job Search"  /> </a>
        </x-slot:brand>
 
        {{-- Right side actions --}}

        <x-slot:actions>
            
            @if(session()->has('user'))

                <x-button icon="s-envelope" class="btn-circle relative text-green-500">
                    <x-badge value="2" class="badge-error absolute -right-2 -top-2" />
                </x-button>
                
                <x-button icon="s-bell" class="btn-circle relative text-yellow-500">
                    <x-badge value="4" class="badge-error absolute -right-2 -top-2" />
                </x-button>

                <x-dropdown>
                    <x-slot:trigger>
                        <x-button label="{{ session('user')->name }}" icon="fas.user-circle" class="btn-ghost btn-sm text-blue-500" responsive />
                    </x-slot:trigger>
                
                    <x-menu-item title="Job Applied" />
                    <x-menu-item title="Logout" link="/logout"/>
                </x-dropdown>
            @else
                @if(!request()->is('login'))
                    <x-button label="Login" icon="fas.user-circle" link="/login" class="btn-ghost btn-sm text-blue-500" responsive /> 
                @endif
            @endif

            
            
                
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