<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50 dark:bg-slate-950 relative overflow-hidden transition-colors duration-300">
        
        <!-- Ornamen Gradasi Latar Belakang -->
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none dark:bg-purple-500/5"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none dark:bg-indigo-500/5"></div>

        <!-- Wadah Utama Register -->
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-800/80 shadow-2xl shadow-slate-100 dark:shadow-none rounded-[2.5rem] relative z-10">
            
            <!-- Bagian Logo & Header Form -->
            <div class="flex flex-col items-center mb-8">
                <a href="/" class="group mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-600 to-indigo-600 flex items-center justify-center shadow-lg shadow-purple-200 dark:shadow-none transform group-hover:scale-105 transition-all duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                </a>
                <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    Buat Akun <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-400 dark:to-indigo-400">Baru</span>
                </h2>
                <p class="text-xs text-slate-400 dark:text-slate-500 font-light mt-1 text-center">
                    Daftarkan akun operator baru untuk membantu pengelolaan data administrasi jemaat.
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- 1. Nama Lengkap -->
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <input 
                            id="name" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            autofocus 
                            autocomplete="name"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm text-slate-800 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/10 transition-all duration-200"
                            placeholder="Nama Lengkap Operator"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs" />
                </div>

                <!-- 2. Alamat Email -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="username"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm text-slate-800 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/10 transition-all duration-200"
                            placeholder="nama@gereja.org"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
                </div>

                <!-- 3. Kata Sandi -->
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm text-slate-800 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/10 transition-all duration-200"
                            placeholder="Minimal 8 karakter"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
                </div>

                <!-- 4. Konfirmasi Kata Sandi -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">
                        Konfirmasi Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <input 
                            id="password_confirmation" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50/50 dark:bg-slate-950/50 border border-slate-200 dark:border-slate-800 rounded-2xl text-sm text-slate-800 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/10 transition-all duration-200"
                            placeholder="Ulangi kata sandi"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs" />
                </div>

                <!-- 5. Opsi & Tombol Aksi -->
                <div class="flex flex-col gap-4 pt-4">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white text-sm font-bold rounded-2xl shadow-lg shadow-purple-200/80 dark:shadow-none transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <span>Daftarkan Akun</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </button>

                    <a class="text-xs font-semibold text-slate-400 dark:text-slate-500 hover:text-indigo-600 dark:hover:text-indigo-400 text-center transition-colors py-2" href="{{ route('login') }}">
                        Sudah punya akun? <span class="text-indigo-600 dark:text-indigo-400 underline ml-0.5">Masuk di sini</span>
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>