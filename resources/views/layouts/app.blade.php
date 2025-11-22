<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Web2 F1 Projekt') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-900 text-gray-100">
    <div class="min-h-screen flex flex-col">

        @include('layouts.navigation')

        @if (isset($header))
            <header class="border-b border-slate-800 bg-slate-900/90 backdrop-blur">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="flex-1">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <footer class="border-t border-slate-800 bg-slate-950 text-xs text-slate-400">
            <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between">
                <span>Cs. Nagy Dániel - FN25MA | Rafai Roland - VLB1VG</span>
                <span>{{ date('Y') }}</span>
            </div>
        </footer>
    </div>
</body>
</html>
