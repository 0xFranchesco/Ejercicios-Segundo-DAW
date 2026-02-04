<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('icono.ico') }}">

    <title>{{ config('app.name', 'Chat') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        * {
            -webkit-tap-highlight-color: transparent;
        }

        html {
            height: auto;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }

        body {
            height: auto;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            background-color: #1f2937;
        }

        /* Prevenir zoom en iOS */
        input, textarea, select, button, a {
            font-size: 16px !important;
        }
    </style>
    
    @stack('styles')
</head>

<body class="text-gray-100">
    @yield('content')
    
    @livewireScripts
    @stack('scripts')
    
    <script>
        // Fix adicional para iOS
        if (/iPhone|iPad|iPod/.test(navigator.userAgent)) {
            document.documentElement.style.height = 'auto';
            document.documentElement.style.overflow = 'auto';
            document.body.style.height = 'auto';
            document.body.style.overflow = 'auto';
            document.body.style.position = 'static';
        }
    </script>
</body>
</html>