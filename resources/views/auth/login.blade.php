<x-guest-layout>
    <div class="h-screen w-full flex flex-col md:flex-row bg-slate-50 dark:bg-slate-950 transition-colors duration-300 md:overflow-hidden">
        
        <div class="hidden md:flex md:w-1/2 h-full relative bg-slate-100 dark:bg-slate-900 overflow-hidden">
            <img src="/images/login.jpg" alt="Banner Gereja" class="absolute inset-0 w-full h-full object-cover opacity-90 dark:opacity-40 transition-opacity duration-300">
            <div class="absolute inset-y-0 right-0 w-1/3 bg-gradient-to-r from-transparent to-slate-50 dark:to-slate-950 pointer-events-none z-10"></div>
            <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-slate-950/80 via-slate-950/30 to-transparent pointer-events-none z-10"></div>
            
            <div class="absolute inset-0 flex flex-col justify-end p-8 lg:p-12 xl:p-16 z-20">
                <h3 class="text-3xl lg:text-4xl font-black text-white mb-4 tracking-tight" style="font-family: 'Playfair Display', serif;">
                    GSJA El-Zimrah
                </h3>
                <p class="text-slate-100 max-w-sm lg:max-w-md leading-relaxed text-sm lg:text-base font-medium">
                    "Diberkatilah orang yang mengandalkan TUHAN, yang menaruh harapannya pada TUHAN!" 
                    <br><span class="text-xs lg:text-sm font-semibold text-slate-300 mt-2 inline-block">(Yeremia 17:7 TB)</span>
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/2 h-full flex items-center justify-center p-4 sm:p-8 md:p-12 lg:p-16 md:overflow-y-auto relative">
            
            <button id="theme-toggle-btn" type="button" class="absolute top-6 right-6 p-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 shadow-sm hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none transition-all duration-200 z-30">
                <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 14.05l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 111.414 1.414zm2.12-10.607a1 1 0 011.414 0l.706.707a1 1 0 11-1.414 1.414l-.707-.707a1 1 0 010-1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z"></path>
                </svg>
                <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </button>

            <div class="w-full max-w-md bg-white dark:bg-slate-900/60 dark:backdrop-blur-xl border border-slate-200 dark:border-slate-800/80 rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/50 dark:shadow-none transition-all duration-300 my-auto">
                
                <div class="flex flex-col mb-6">
                    <a href="/" class="mb-4 inline-block w-fit">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-gradient-to-tr from-indigo-600 to-amber-500 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </a>
                    <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight sm:text-3xl">Selamat Datang</h2>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 mt-1.5 font-medium">Silakan masuk menggunakan akun administratif Anda.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                @if ($errors->any())
                    <div class="mb-5 p-4 rounded-xl sm:rounded-2xl bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/50 text-red-700 dark:text-red-400 text-xs sm:text-sm" role="alert">
                        <div class="flex items-center gap-2 font-bold mb-1">
                            <svg class="w-4 h-4 text-red-600 dark:text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <span>gagal masuk</span>
                        </div>
                        <ul class="list-disc pl-5 font-medium space-y-0.5 opacity-90">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-5">
                    @csrf
                    
                    <div class="space-y-1.5">
                        <label class="block text-[10px] sm:text-xs font-black text-slate-700 dark:text-slate-400 uppercase tracking-wider">Email Administratif</label>
                        <input 
                            type="email" 
                            name="email" 
                            required 
                            value="{{ old('email') }}"
                            class="block w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800/80 rounded-xl sm:rounded-2xl 
                                   text-sm sm:text-base text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600
                                   focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 
                                   transition-all duration-200 font-medium @error('email') border-red-400 dark:border-red-900 focus:ring-red-500/10 @enderror"
                            placeholder="nama@gereja.com"
                        >
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center">
                            <label class="block text-[10px] sm:text-xs font-black text-slate-700 dark:text-slate-400 uppercase tracking-wider">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a class="text-[11px] sm:text-xs font-bold text-indigo-700 dark:text-indigo-400 hover:underline" href="{{ route('password.request') }}">
                                    Lupa sandi?
                                </a>
                            @endif
                        </div>
                        <input 
                            type="password" 
                            name="password" 
                            required 
                            class="block w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800/80 rounded-xl sm:rounded-2xl 
                                   text-sm sm:text-base text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600
                                   focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 
                                   transition-all duration-200 font-medium @error('password') border-red-400 dark:border-red-900 focus:ring-red-500/10 @enderror"
                            placeholder="••••••••"
                        >
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center select-none cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 dark:border-slate-800 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:bg-slate-950">
                            <span class="ms-2 text-xs sm:text-sm font-bold text-slate-600 dark:text-slate-400">Ingat perangkat ini</span>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-3 sm:py-3.5 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-600 dark:hover:bg-indigo-500 text-white font-black text-xs sm:text-sm uppercase tracking-widest rounded-xl sm:rounded-2xl transition-all duration-200 shadow-md shadow-indigo-600/10 dark:shadow-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-slate-900">
                            Masuk ke Dashboard
                        </button>
                    </div>
                </form>
            </div>
            
        </div>

    </div>

    <script>
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');
        const toggleBtn = document.getElementById('theme-toggle-btn');

        // 1. Sinkronisasi Awal Tampilan Icon Tombol
        function updateIcons() {
            if (document.documentElement.classList.contains('dark')) {
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            } else {
                darkIcon.classList.remove('hidden');
                lightIcon.classList.add('hidden');
            }
        }
        
        updateIcons();

        // 2. Aksi Klik Tombol: Mengubah Tema Seketika & Menyimpannya ke Storage Utama
        toggleBtn.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                localStorage.setItem('color-theme', 'dark');
            }
            updateIcons();
        });
    </script>
</x-guest-layout>