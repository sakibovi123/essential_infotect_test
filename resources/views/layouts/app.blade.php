<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TEST') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <nav class="bg-white shadow">
            <div class="container mx-auto px-4 py-3 flex items-center justify-center gap-5">
                <a href="/" class="font-bold text-xl uppercase">Complaint Box</a>
                @auth
                    <a class="font-bold" href="/logout" class="ml-4">Logout</a>
                @endauth
                @if(!\Illuminate\Support\Facades\Auth::user())
                    <a class="text-md font-bold" href="{{ route('login') }}">Sign in</a>
                    <a class="text-md font-bold" href="{{ route('register') }}">Sign up</a>
                @endif

                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                        <a class="font-bold" href="{{ route('admin.complaints') }}">Complain List</a>
                        <a class="font-bold" href="{{ route('admin.patients') }}">Patient List</a>
                        <a class="font-bold" href="{{ route('admin.approved_patients') }}">Approved Patient List</a>
                    @else
                        <a href="{{ route('patient.complaints') }}" class="font-bold" href="{{ route('admin.approved_patients') }}">My Complaint List</a>
                    @endif
                @endauth

            </div>
        </nav>

        <div class="container mx-auto mt-10">
            @yield('content')

        </div>
    </body>
</html>
