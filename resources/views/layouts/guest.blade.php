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
    <body class="antialiased">
        <div class="site-shell">
            <div class="container" style="padding-top:2rem;">
                <a href="/" class="brand">
                    <span class="brand-mark">m</span><span class="brand-name">my<span>blog</span></span>
                </a>
            </div>
            <div class="surface" style="width:min(100% - 2.5rem, 460px); margin:4rem auto; padding:2rem;">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
