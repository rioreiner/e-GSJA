<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistem Informasi Gereja') }}</title>

        <!-- Google Fonts Premium: Plus Jakarta Sans untuk Tipografi Modern -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts & Tailwind Styles (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
        
        <!-- Script Pendukung Deteksi Dark Mode Otomatis -->
        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body class="h-full antialiased text-slate-900 dark:text-slate-100 bg-slate-50 dark:bg-slate-950 selection:bg-indigo-500/30 selection:text-indigo-900 dark:selection:text-indigo-200">
        
        <!-- Slot Konten Utama (Akan diisi oleh login.blade / register.blade) -->
        <div class="min-h-screen">
            {{ $slot }}
        </div>
        
    </body>
</html>