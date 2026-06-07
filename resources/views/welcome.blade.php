<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sistem Informasi Gereja') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm border-b border-gray-200">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center">

                    <h1 class="text-2xl font-bold text-blue-600">
                        Gereja
                    </h1>

                </div>

                <!-- Menu -->
                <div class="hidden md:flex items-center gap-8">

                    <a href="{{ route('home') }}"
                        class="text-gray-700 hover:text-blue-600 transition">
                        Home
                    </a>

                    <a href="{{ route('berita.index') }}"
                        class="text-gray-700 hover:text-blue-600 transition">
                        Berita
                    </a>

                    <a href="{{ route('events.index') }}"
                        class="text-gray-700 hover:text-blue-600 transition">
                        Event
                    </a>

                    <a href="{{ route('jadwal.index') }}"
                        class="text-gray-700 hover:text-blue-600 transition">
                        Jadwal
                    </a>

                    <a href="{{ route('keuangan.public') }}"
                        class="text-gray-700 hover:text-blue-600 transition">
                        Keuangan
                    </a>

                </div>

                <!-- Login Button -->
                <div>

                    @auth

                        <a href="{{ auth()->user()->getDashboardRoute() }}"
                            class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition">
                            Dashboard
                        </a>

                    @else

                        <a href="{{ route('login') }}"
                            class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition">
                            Login Admin
                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Left -->
                <div>

                    <span
                        class="inline-block px-4 py-2 rounded-full bg-white/20 text-white text-sm font-medium mb-6">
                        Sistem Informasi Manajemen Gereja
                    </span>

                    <h1
                        class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">

                        Pelayanan Gereja
                        Lebih Modern &
                        Transparan

                    </h1>

                    <p class="text-lg text-blue-100 leading-relaxed mb-8">

                        Platform digital gereja untuk manajemen berita,
                        jadwal ibadah, event pelayanan, dan laporan
                        keuangan secara real-time.

                    </p>

                    <div class="flex flex-wrap gap-4">

                        <a href="{{ route('home') }}"
                            class="px-8 py-4 bg-white text-blue-700 rounded-2xl font-semibold hover:bg-gray-100 transition">

                            Jelajahi Website

                        </a>

                        <a href="{{ route('login') }}"
                            class="px-8 py-4 border border-white text-white rounded-2xl font-semibold hover:bg-white hover:text-blue-700 transition">

                            Login Admin

                        </a>

                    </div>

                </div>

                <!-- Right -->
                <div class="hidden lg:flex justify-center">

                    <div
                        class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-10 shadow-2xl w-full max-w-md">

                        <div class="space-y-6">

                            <div class="bg-white rounded-2xl p-5 shadow">

                                <p class="text-sm text-gray-500 mb-2">
                                    Total Jemaat
                                </p>

                                <h3 class="text-3xl font-bold text-blue-600">
                                    {{ $totalJemaat ?? '0' }}
                                </h3>

                            </div>

                            <div class="bg-white rounded-2xl p-5 shadow">

                                <p class="text-sm text-gray-500 mb-2">
                                    Event Aktif
                                </p>

                                <h3 class="text-3xl font-bold text-indigo-600">
                                    {{ $totalEvent ?? '0' }}
                                </h3>

                            </div>

                            <div class="bg-white rounded-2xl p-5 shadow">

                                <p class="text-sm text-gray-500 mb-2">
                                    Jadwal Ibadah
                                </p>

                                <h3 class="text-3xl font-bold text-purple-600">
                                    {{ $totalJadwal ?? '0' }}
                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Features -->
    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16">

                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Fitur Utama Sistem
                </h2>

                <p class="text-gray-500 text-lg">
                    Membantu pengelolaan gereja menjadi lebih efektif.
                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Card -->
                <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-xl transition">

                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center mb-6">

                        <span class="text-2xl">📰</span>

                    </div>

                    <h3 class="text-xl font-bold mb-3">
                        Berita Gereja
                    </h3>

                    <p class="text-gray-500">
                        Informasi terbaru kegiatan dan pelayanan gereja.
                    </p>

                </div>

                <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-xl transition">

                    <div
                        class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center mb-6">

                        <span class="text-2xl">📅</span>

                    </div>

                    <h3 class="text-xl font-bold mb-3">
                        Jadwal Ibadah
                    </h3>

                    <p class="text-gray-500">
                        Jadwal ibadah dan pelayanan yang selalu update.
                    </p>

                </div>

                <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-xl transition">

                    <div
                        class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center mb-6">

                        <span class="text-2xl">💰</span>

                    </div>

                    <h3 class="text-xl font-bold mb-3">
                        Transparansi Keuangan
                    </h3>

                    <p class="text-gray-500">
                        Laporan pemasukan dan pengeluaran gereja.
                    </p>

                </div>

                <div class="bg-gray-50 rounded-3xl p-8 hover:shadow-xl transition">

                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center mb-6">

                        <span class="text-2xl">🎉</span>

                    </div>

                    <h3 class="text-xl font-bold mb-3">
                        Event Gereja
                    </h3>

                    <p class="text-gray-500">
                        Informasi event dan kegiatan pelayanan gereja.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <h2 class="text-2xl font-bold text-white mb-4">
                Sistem Informasi Gereja
            </h2>

            <p class="mb-6">
                Platform digital gereja modern dan profesional.
            </p>

            <p class="text-sm">
                © {{ date('Y') }} Sistem Informasi Gereja. All rights reserved.
            </p>

        </div>

    </footer>

</body>

</html>