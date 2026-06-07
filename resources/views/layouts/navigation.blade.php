<nav x-data="{ open: false }" class="bg-white/95 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 fixed top-0 inset-x-0 z-50 shadow-sm transition-all duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-8">
                <!-- Logo & Identitas Gereja -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500 via-indigo-600 to-indigo-700 flex items-center justify-center shadow-md shadow-indigo-200/50 dark:shadow-none transform group-hover:scale-105 transition-all">
                            <img src="/images/gsja.png" alt="Logo" class="w-5.5 h-5.5" />
                        </div>
                        <div class="flex flex-col text-left">
                            <span class="text-base font-black tracking-tight text-slate-900 dark:text-white leading-none">
                                GSJA El-Zimrah
                            </span>
                            <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 tracking-widest uppercase mt-1">
                                Panel Pelayanan
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links (Kapsul Menu Tengah yang Dipertegas) -->
                <div class="hidden md:flex items-center gap-1.5 bg-slate-100 dark:bg-slate-800/60 p-1.5 rounded-2xl border border-slate-200/60 dark:border-slate-700/50">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5">
                        <i data-lucide="layout-grid" class="w-4 h-4"></i> {{ __('Dashboard') }}
                    </x-nav-link>

                    <a href="{{ route('berita.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 text-slate-800 dark:text-slate-200 hover:text-indigo-600 hover:bg-white dark:hover:bg-slate-900">
                        <i data-lucide="book-open" class="w-4 h-4 text-indigo-600"></i> Berita
                    </a>

                    <a href="{{ route('events.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 text-slate-800 dark:text-slate-200 hover:text-indigo-600 hover:bg-white dark:hover:bg-slate-900">
                        <i data-lucide="sparkles" class="w-4 h-4 text-indigo-600"></i> Event
                    </a>

                    <a href="{{ route('jadwal.index') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 text-slate-800 dark:text-slate-200 hover:text-indigo-600 hover:bg-white dark:hover:bg-slate-900">
                        <i data-lucide="calendar-days" class="w-4 h-4 text-indigo-600"></i> Jadwal
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown (Kanan) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-200 dark:border-slate-700 text-xs font-bold rounded-xl text-slate-800 dark:text-slate-200 bg-slate-50 dark:bg-slate-800/50 hover:text-indigo-600 dark:hover:text-indigo-400 focus:outline-none transition ease-in-out duration-150 shadow-sm gap-2">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 border-b border-slate-150 dark:border-slate-800 mb-1">
                            Manajemen Akun
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="text-xs font-semibold flex items-center gap-2 text-slate-700 dark:text-slate-300">
                            <i data-lucide="user" class="w-3.5 h-3.5 text-slate-400"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <a href="{{ route('home') }}" class="block w-full px-4 py-2 text-start text-xs font-semibold flex items-center gap-2 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition duration-150 ease-in-out">
                            <i data-lucide="external-link" class="w-3.5 h-3.5 text-slate-400"></i> Lihat Website
                        </a>

                        <hr class="border-slate-100 dark:border-slate-800 my-1">

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="text-xs font-bold text-red-600 dark:text-red-400 flex items-center gap-2 hover:bg-red-50 dark:hover:bg-red-950/30"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i data-lucide="log-out" class="w-3.5 h-3.5"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile Toggle) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile View) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 pt-2 pb-4 space-y-1 shadow-inner">
        <div class="pt-1 pb-2 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center gap-2 rounded-xl font-bold text-slate-900 dark:text-slate-100">
                <i data-lucide="layout-grid" class="w-4 h-4 text-indigo-600"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <a href="{{ route('berita.index') }}" class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-800">
                <i data-lucide="book-open" class="w-4 h-4 text-indigo-600"></i> Berita Jemaat
            </a>
            <a href="{{ route('events.index') }}" class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold text-slate-900 dark:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-800">
                <i data-lucide="sparkles" class="w-4 h-4 text-indigo-600"></i> Event / Kegiatan
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-2 border-t border-slate-200 dark:border-slate-800">
            <div class="px-4 mb-3">
                <div class="font-bold text-base text-slate-900 dark:text-slate-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center gap-2 rounded-xl font-semibold text-slate-700 dark:text-slate-300">
                    <i data-lucide="user" class="w-4 h-4 text-slate-400"></i> {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="flex items-center gap-2 rounded-xl font-bold text-red-600 dark:text-red-400 hover:bg-red-50"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i data-lucide="log-out" class="w-4 h-4"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>