<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GSJA El-Zimrah - Portal Jemaat') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800&family=playfair-display:ital,wght=0,600;0,700;1,400&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght=900&family=Playfair+Display:ital,wght=1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons & Flickity Slider CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <!-- Skrip Inisialisasi Tema (Mencegah Efek Berkedip/Flash Saat Reload) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Custom CSS untuk Running Text / Marquee Animation -->
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            animation: marquee 25s linear infinite;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ 
        darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
        toggleTheme() {
            this.darkMode = !this.darkMode;
            if (this.darkMode) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
            this.$nextTick(() => { if(typeof lucide !== 'undefined') lucide.createIcons(); });
        }
      }"
      class="font-sans antialiased bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 selection:bg-indigo-500 selection:text-white transition-colors duration-300">

    <div class="min-h-screen flex flex-col justify-between">

        <!-- 1. NAVIGATION BAR -->
        <nav class="fixed top-0 inset-x-0 z-50 bg-white/95 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 shadow-sm transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">

                    <!-- [KIRI]: Identitas & Logo GSJA -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500 via-indigo-600 to-indigo-700 flex items-center justify-center shadow-md shadow-indigo-200/50 dark:shadow-none transform group-hover:scale-105 transition-all">
                                <img src="/images/gsja.png" alt="Logo" class="w-5.5 h-5.5" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-base font-black tracking-tight text-slate-900 dark:text-white leading-none">
                                    GSJA El-Zimrah
                                </span>
                                <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 tracking-widest uppercase mt-1">
                                    Sidang Jemaat Allah
                                </span>
                            </div>
                        </a>
                    </div>

                    <!-- [TENGAH]: Navigasi Utama Kapsul -->
                    <div class="hidden md:flex items-center gap-1.5 bg-slate-100 dark:bg-slate-800/60 p-1.5 rounded-2xl border border-slate-200/60 dark:border-slate-700/50">
                        <a href="{{ route('home') }}" 
                           class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white dark:hover:bg-slate-900 shadow-sm">
                            <i data-lucide="church" class="w-4 h-4 text-indigo-600 dark:text-indigo-400"></i> Beranda
                        </a>

                        <a href="{{ route('berita.index') }}" 
                           class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 
                           {{ request()->routeIs('berita.*') ? 'text-white bg-indigo-600 shadow-md font-extrabold' : 'text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white dark:hover:bg-slate-900' }}">
                            <i data-lucide="book-open" class="w-4 h-4 {{ request()->routeIs('berita.*') ? 'text-white' : 'text-indigo-600 dark:text-indigo-400' }}"></i> Warta
                        </a>
                        
                        <a href="{{ route('events.index') }}" 
                           class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 
                           {{ request()->routeIs('events.*') ? 'text-white bg-indigo-600 shadow-md font-extrabold' : 'text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white dark:hover:bg-slate-900' }}">
                            <i data-lucide="sparkles" class="w-4 h-4 {{ request()->routeIs('events.*') ? 'text-white' : 'text-indigo-600 dark:text-indigo-400' }}"></i> Acara
                        </a>
                        
                        <a href="{{ route('jadwal.index') }}" 
                           class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 
                           {{ request()->routeIs('jadwal.*') ? 'text-white bg-indigo-600 shadow-md font-extrabold' : 'text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white dark:hover:bg-slate-900' }}">
                            <i data-lucide="calendar-days" class="w-4 h-4 {{ request()->routeIs('jadwal.*') ? 'text-white' : 'text-indigo-600 dark:text-indigo-400' }}"></i> Jadwal Ibadah
                        </a>
                        
                        <a href="{{ route('keuangan.public') }}" 
                           class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 
                           {{ request()->routeIs('keuangan.*') ? 'text-white bg-indigo-600 shadow-md font-extrabold' : 'text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-white dark:hover:bg-slate-900' }}">
                            <i data-lucide="heart-handshake" class="w-4 h-4 {{ request()->routeIs('keuangan.*') ? 'text-white' : 'text-indigo-600 dark:text-indigo-400' }}"></i> Kas Kasih
                        </a>
                    </div>

                    <!-- [KANAN]: Akses Masuk Panel & Tema Switcher -->
                    <div class="hidden md:flex items-center gap-3">
                        <!-- Desktop Dark Mode Toggle -->
                        <button @click="toggleTheme()" type="button" class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900 text-slate-700 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-amber-400 hover:border-slate-300 dark:hover:border-slate-700 transition-all duration-200" title="Ubah Tema">
                            <span x-show="darkMode" x-cloak><i data-lucide="sun" class="w-4 h-4"></i></span>
                            <span x-show="!darkMode" x-cloak><i data-lucide="moon" class="w-4 h-4"></i></span>
                        </button>

                        @auth
                            <div class="flex items-center gap-2 pl-3 border-l border-slate-200 dark:border-slate-800">
                                <a href="{{ route(auth()->user()->getDashboardRoute()) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white dark:bg-white dark:text-slate-900 dark:hover:bg-slate-100 text-xs font-bold rounded-xl shadow-sm transition-all">
                                    <i data-lucide="layout-grid" class="w-3.5 h-3.5"></i> Panel Pelayanan
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-500 rounded-xl hover:bg-red-50 dark:hover:bg-red-950/30 transition-colors" title="Keluar">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 px-4 py-2 border border-slate-300 dark:border-slate-700 text-slate-800 dark:text-slate-200 hover:text-indigo-600 hover:border-indigo-500 text-xs font-bold rounded-xl bg-white dark:bg-slate-900/50 shadow-sm transition-all">
                                <i data-lucide="user-cog" class="w-3.5 h-3.5 text-indigo-600"></i> Sekretariat
                            </a>
                        @endauth
                    </div>

                    <!-- Tombol Menu Mobile -->
                    <div class="md:hidden flex items-center gap-2">
                        <!-- Mobile Dark Mode Toggle Pin -->
                        <button @click="toggleTheme()" type="button" class="p-2 rounded-xl text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
                            <span x-show="darkMode" x-cloak><i data-lucide="sun" class="w-5 h-5 text-amber-400"></i></span>
                            <span x-show="!darkMode" x-cloak><i data-lucide="moon" class="w-5 h-5"></i></span>
                        </button>
                        
                        <button type="button" onclick="toggleMobileMenu()" class="p-2 rounded-xl text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none">
                            <i data-lucide="menu" id="menu-icon-open" class="w-6 h-6"></i>
                            <i data-lucide="x" id="menu-icon-close" class="w-6 h-6 hidden"></i>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Panel Navigasi Mobile Dropdown -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 pt-3 pb-6 space-y-2 shadow-inner">
                <a href="{{ route('home') }}#tentang-grid" onclick="toggleMobileMenu()" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-100 hover:bg-indigo-50 dark:hover:bg-slate-800">
                    <i data-lucide="church" class="w-5 h-5 text-indigo-600"></i> Profil Gereja
                </a>
                <a href="{{ route('berita.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-100 hover:bg-indigo-50 dark:hover:bg-slate-800">
                    <i data-lucide="book-open" class="w-5 h-5 text-indigo-600"></i> Berita
                </a>
                <a href="{{ route('events.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-100 hover:bg-indigo-50 dark:hover:bg-slate-800">
                    <i data-lucide="sparkles" class="w-5 h-5 text-indigo-600"></i> Persekutuan
                </a>
                <a href="{{ route('jadwal.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-100 hover:bg-indigo-50 dark:hover:bg-slate-800">
                    <i data-lucide="calendar-days" class="w-5 h-5 text-indigo-600"></i> Jadwal Ibadah
                </a>
                <a href="{{ route('keuangan.public') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-100 hover:bg-indigo-50 dark:hover:bg-slate-800">
                    <i data-lucide="heart-handshake" class="w-5 h-5 text-indigo-600"></i> Kas Kasih
                </a>
                <hr class="border-slate-200 dark:border-slate-800 my-2">
                @auth
                    <a href="{{ auth()->user()->getDashboardRoute() }}" class="flex items-center justify-center gap-2 w-full py-3 bg-slate-900 text-white rounded-xl text-sm font-bold">
                        <i data-lucide="layout-grid" class="w-4 h-4"></i> Panel Pelayanan
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full py-3 border border-slate-300 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-200">
                        <i data-lucide="user-cog" class="w-4 h-4 text-indigo-600"></i> Sekretariat Login
                    </a>
                @endauth
            </div>
        </nav>

        @if(request()->routeIs('home') || request()->path() == '/')
            
 <!-- [SECTION 1]: TENTANG GEREJA (CINEMATIC FULL SCREEN BANNER - LIGHT MODE FRIENDLY) -->
<section id="tentang-gereja" class="relative h-screen w-full bg-white dark:bg-slate-950 overflow-hidden flex items-center justify-center transition-colors duration-300">
    
    <!-- BACKGROUND CINEMATIC BANNER WITH GRADIENT MASK -->
    <div class="absolute inset-0 w-full h-full z-0 select-none pointer-events-none">
        <!-- Opasitas di mode terang diturunkan ke 35% agar tidak menghasilkan efek kontras negatif/kusam -->
        <img src="{{ asset('images/church-atmosphere.gif') }}" 
             alt="GSJA El-Zimrah Atmosphere" 
             class="w-full h-full object-cover object-center opacity-35 dark:opacity-25 scale-100 transform motion-safe:animate-[pulse_8s_ease-in-out_infinite]">
        
        <!-- Gradasi Atas-Bawah: Menggunakan mix-blend-multiply di mode terang agar warna menyatu alami tanpa efek abu-abu -->
        <div class="absolute inset-0 bg-gradient-to-b from-white via-transparent to-white dark:from-slate-950 dark:via-slate-950/40 dark:to-slate-950 mix-blend-multiply dark:mix-blend-normal z-10"></div>
        
        <!-- Gradasi Kiri-Kanan: Menjaga fokus visual tetap bersih di bagian tengah -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/60 via-transparent to-white/60 dark:from-slate-950 dark:via-transparent dark:to-slate-950 z-10"></div>
    </div>

    <!-- CORE CONTENT CONTAINER -->
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 z-20 text-center space-y-8 mt-12">
        <div class="space-y-0">
            <h3 class="text-[11px] font-black uppercase tracking-[0.4em] text-slate-600 dark:text-slate-400" style="font-family: 'Montserrat', sans-serif;">Welcome</h3>
            <!-- Penajaman Gradasi Teks Utama pada Mode Terang (Menggunakan warna slate yang lebih solid) -->
            <h2 class="text-5xl sm:text-7xl md:text-8xl font-black italic bg-gradient-to-b from-slate-900 via-slate-950 to-indigo-950 dark:from-white dark:via-slate-200 dark:to-slate-400 bg-clip-text text-transparent select-none drop-shadow-sm dark:drop-shadow-2xl py-4" 
                style="font-family: 'Playfair Display', serif; tracking-tight">
                GSJA El-Zimrah
            </h2>
        </div>

        <!-- 3 Pilar Inti dengan Penegasan Kontras Komponen -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-6 sm:gap-12 text-slate-800 dark:text-slate-300" style="font-family: 'Montserrat', sans-serif;">
            
            <!-- Pilar: Kasih -->
            <div class="flex items-center gap-2.5 group">
                <div class="w-7 h-7 rounded-lg bg-red-100 dark:bg-red-500/10 border border-red-300 dark:border-red-500/20 text-red-700 dark:text-red-400 flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm dark:shadow-none">
                    <i data-lucide="heart" class="w-4 h-4"></i>
                </div>
                <span class="text-xs font-black uppercase tracking-widest text-slate-800 dark:text-slate-300">Kasih</span>
            </div>

            <div class="hidden sm:block w-1.5 h-1.5 bg-slate-400 dark:bg-slate-700 rounded-full"></div>

            <!-- Pilar: Integritas -->
            <div class="flex items-center gap-2.5 group">
                <div class="w-7 h-7 rounded-lg bg-blue-100 dark:bg-blue-500/10 border border-blue-300 dark:border-blue-500/20 text-blue-700 dark:text-blue-400 flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm dark:shadow-none">
                    <i data-lucide="shield" class="w-4 h-4"></i>
                </div>
                <span class="text-xs font-black uppercase tracking-widest text-slate-800 dark:text-slate-300">Integritas</span>
            </div>

            <div class="hidden sm:block w-1.5 h-1.5 bg-slate-400 dark:bg-slate-700 rounded-full"></div>

            <!-- Pilar: Roh Kudus -->
            <div class="flex items-center gap-2.5 group">
                <div class="w-7 h-7 rounded-lg bg-amber-100 dark:bg-orange-500/10 border border-amber-300 dark:border-orange-500/20 text-amber-800 dark:text-orange-400 flex items-center justify-center group-hover:scale-110 transition-transform shadow-sm dark:shadow-none">
                    <i data-lucide="flame" class="w-4 h-4"></i>
                </div>
                <span class="text-xs font-black uppercase tracking-widest text-slate-800 dark:text-slate-300">Roh Kudus</span>
            </div>
        </div>
    </div>

    <!-- PERSPECTIVE BOTTOM GLOW EFFECT -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2/3 h-24 bg-indigo-500/[0.06] dark:bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>
</section>
@endif

        <!-- SECTION DIVIDER: MODERN TICKER / RUNNING TEXT -->
        <div class="relative w-full bg-indigo-600 dark:bg-indigo-950 py-4 border-y border-indigo-500/30 overflow-hidden select-none z-30" style="font-family: 'Montserrat', sans-serif;">
            <div class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-indigo-600 to-transparent dark:from-indigo-950 z-10 pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-indigo-600 to-transparent dark:from-indigo-950 z-10 pointer-events-none"></div>
            
            <div class="flex whitespace-nowrap overflow-hidden">
                <!-- Track 1 -->
                <div class="inline-flex gap-8 items-center animate-marquee shrink-0 text-white font-black text-[10px] uppercase tracking-[0.25em]">
                    <span>Berakar Dalam Kebenaran</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                    <span>Berbuah Dalam Kasih</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                    <span>Berdampak Bagi Sesama</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                    <span>GSJA EL-Zimrah Tual</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                </div>
                <!-- Track 2 -->
                <div class="inline-flex gap-8 items-center animate-marquee shrink-0 text-white font-black text-[10px] uppercase tracking-[0.25em]" aria-hidden="true">
                    <span>Berakar Dalam Kebenaran</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                    <span>Berbuah Dalam Kasih</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                    <span>Berdampak Bagi Sesama</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                    <span>GSJA EL-Zimrah Tual</span>
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full opacity-60"></div>
                </div>
            </div>
        </div>

        <!-- 3 MAIN CONTENTS SLOT -->
        <main id="main-content" class="py-12 flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <!-- 4. FOOTER -->
        <footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800/60 pt-14 pb-8 transition-colors">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10">
                    
                    <div class="md:col-span-2 space-y-4">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center">
                             <img src="/images/gsja.png" alt="Logo" class="w-5.5 h-5.5" />   
                            </div>
                            <span class="text-base font-bold text-slate-900 dark:text-white">
                                GSJA El-Zimrah
                            </span>
                        </div>
                        <p class="text-xs leading-relaxed max-w-sm text-slate-500 dark:text-slate-400">
                            Wadah persekutuan Kristen Protestan di bawah naungan Sinode Gereja Sidang-Sidang Jemaat Allah di Indonesia. Tempat di mana setiap jiwa disambut hangat untuk mengalami perjumpaan pribadi dengan Tuhan.
                        </p>
                    </div>

                    <div>
                        <h4 class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-4">
                            Berita
                        </h4>
                        <ul class="space-y-2.5 text-xs font-bold">
                            <li><a href="{{ route('berita.index') }}" class="text-slate-700 dark:text-slate-300 hover:text-indigo-600 transition-colors inline-flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 opacity-40"></i> Berita</a></li>
                            <li><a href="{{ route('events.index') }}" class="text-slate-700 dark:text-slate-300 hover:text-indigo-600 transition-colors inline-flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 opacity-40"></i> Kegiatan & Persekutuan</a></li>
                            <li><a href="{{ route('jadwal.index') }}" class="text-slate-700 dark:text-slate-300 hover:text-indigo-600 transition-colors inline-flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 opacity-40"></i> Rencana Jadwal Ibadah</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-4">
                            Sekretariat & Alamat
                        </h4>
                        <ul class="space-y-2 text-xs text-slate-700 dark:text-slate-400">
                            <li class="font-bold text-slate-900 dark:text-slate-200 inline-flex items-center gap-1.5">
                                <i data-lucide="house" class="w-3.5 h-3.5 text-indigo-500"></i> Rumah Ibadah GSJA
                            </li>
                            <li class="font-bold text-slate-900 dark:text-slate-200 inline-flex items-center gap-1.5">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-indigo-500"></i> Jln.Karel Sadsuitubun
                            </li>
                            <li class="font-bold text-slate-900 dark:text-slate-200 inline-flex items-center gap-1.5">
                                <i data-lucide="mail" class="w-3.5 h-3.5 text-indigo-500"></i> gsjaelzimrah@gmail.com
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="border-t border-slate-200 dark:border-slate-800/80 pt-6 mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-slate-500">
                    <p>&copy; {{ date('Y') }} GSJA El-Zimrah. Melayani dengan Kasih dan Kuasa Roh Kudus.</p>
                    <div class="flex items-center gap-4 font-semibold">
                        <a href="#" class="hover:text-indigo-600 transition-colors">Facebook</a>
                        <a href="#" class="hover:text-indigo-600 transition-colors">Instagram</a>
                        <a href="#" class="hover:text-indigo-600 transition-colors">YouTube Channel</a>
                    </div>
                </div>

            </div>
        </footer>

    </div>

    <!-- Script Toggler Mobile & Lucide Build -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const openIcon = document.getElementById('menu-icon-open');
            const closeIcon = document.getElementById('menu-icon-close');
            
            menu.classList.toggle('hidden');
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>