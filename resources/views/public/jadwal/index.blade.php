<x-app-layout>
    <!-- Include Lucide Icons di bagian atas halaman -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- 1. HEADER HALAMAN JADWAL -->
        <div class="mb-6 relative">
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none dark:bg-emerald-500/5"></div>
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-widest bg-emerald-50 dark:bg-emerald-950/50 px-4 py-2 rounded-full border border-emerald-100/50 dark:border-indigo-900/30">
                        <i data-lucide="calendar-check" class="w-3.5 h-3.5"></i> Waktu Pelayanan
                    </span>

                    <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white tracking-tight mt-5 mb-4">
                        Jadwal <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-indigo-600 dark:from-emerald-400 dark:to-indigo-400">Ibadah</span>
                    </h1>

                    <p class="text-slate-500 dark:text-slate-400 font-light max-w-2xl text-base sm:text-lg leading-relaxed mb-6">
                        Saksikan dan hadiri persekutuan kudus bersama seluruh jemaat. Silakan periksa rincian waktu serta lokasi ibadah di bawah ini.
                    </p>

                    <!-- ================= NEW FEATURE: AYAT ALKITAB UTK IBADAH ================= -->
                    <div class="relative max-w-2xl bg-slate-50/60 dark:bg-slate-900/40 border border-slate-100 dark:border-slate-800/60 p-4 rounded-2xl flex gap-3 items-start backdrop-blur-sm">
                        <i data-lucide="quote" class="w-5 h-5 text-emerald-500 shrink-0 transform rotate-180 mt-1"></i>
                        <div>
                            <p class="text-xs sm:text-sm italic font-medium text-slate-600 dark:text-slate-300 tracking-wide leading-relaxed">
                                "Janganlah kita menjauhkan diri dari pertemuan-pertemuan ibadah kita, seperti dibiasakan oleh beberapa orang, tetapi marilah kita saling menasihati, dan semakin giat melakukannya menjelang Hari Tuhan yang mendekat."
                            </p>
                            <span class="block text-[10px] font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider mt-2">
                                — Ibrani 10:25
                            </span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('pelayanan.export-pdf') }}" 
                   class="inline-flex items-center justify-center gap-2.5 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-2xl shadow-lg shadow-emerald-600/20 transition-all hover:scale-105 self-start sm:self-center shrink-0">
                    <i data-lucide="download" class="w-4 h-4"></i>
                    Unduh Jadwal Pelayanan
                </a>
            </div>
        </div>

        <!-- ================= NEW FEATURE: DINAMIS RUNNING TEXT (SEPERTI LANDING) ================= -->
        <div class="relative flex items-center h-11 w-full bg-slate-100/80 dark:bg-slate-900/40 border border-slate-200/50 dark:border-slate-800/60 rounded-2xl overflow-hidden backdrop-blur-md shadow-sm mb-4">
            <div class="absolute left-0 top-0 bottom-0 z-20 flex items-center gap-1.5 px-4 bg-emerald-600 text-white font-extrabold text-[10px] uppercase tracking-wider rounded-l-2xl shadow-md">
                <i data-lucide="megaphone" class="w-3.5 h-3.5 animate-bounce"></i>
                <span class="hidden sm:inline">Info</span> Jemaat
            </div>

            <div class="w-full h-full flex items-center overflow-hidden pl-24 sm:pl-28 pr-4">
                <marquee class="text-xs sm:text-sm font-medium text-slate-700 dark:text-slate-300 tracking-wide" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                    • <span class="text-emerald-600 dark:text-emerald-400 font-bold">Shalom Jemaat!</span> Selamat datang di halaman info pelayanan resmi.
                    
                    @if(isset($posts) && $posts->count() > 0)
                        @foreach($posts->take(3) as $warta)
                            • <span class="font-bold text-indigo-600 dark:text-indigo-400">Warta:</span> {{ $warta->judul }} 
                        @endforeach
                    @else
                        • Periksa detail jadwal ibadah raya, ibadah kategorial, dan lokasi pelayanan di bawah ini untuk bergabung bersama kami minggu ini.
                    @endif
                </marquee>
            </div>
        </div>

        <!-- KONTEN UTAMA -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($jadwal as $item)
                <div onclick="window.location='{{ route('jadwal.show', $item->id) }}'"
                     class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800/60 shadow-sm 
                            transition-all duration-500 ease-out 
                            hover:scale-[1.03] hover:shadow-2xl hover:border-emerald-200 dark:hover:border-emerald-800/50 
                            cursor-pointer group">
                    
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-[10px] font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/50 px-3 py-1 rounded-lg transition-colors group-hover:bg-emerald-100 dark:group-hover:bg-emerald-900">
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                        </span>
                    </div>

                    <h3 class="text-xl font-black text-slate-900 dark:text-white mb-6 group-hover:text-emerald-600 transition-colors duration-300">
                        {{ $item->nama_kegiatan }}
                    </h3>

                    <div class="space-y-3 border-t border-slate-100 dark:border-slate-800/60 pt-6">
                        <div class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                            <i data-lucide="clock" class="w-4 h-4 text-emerald-500 transition-transform group-hover:rotate-12"></i>
                            <span class="font-bold">{{ $item->waktu }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                            <i data-lucide="map-pin" class="w-4 h-4 text-slate-400 transition-transform group-hover:scale-110"></i>
                            <span>{{ $item->lokasi }}</span>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        <!-- MOBILE CARD -->
        <div class="block md:hidden divide-y divide-slate-100 dark:divide-slate-800/80 rounded-[2rem] overflow-hidden border border-slate-100 dark:border-slate-800/60 shadow-sm">
            @forelse($jadwal as $item)
                <div class="p-6 bg-white dark:bg-slate-900 flex flex-col gap-4 cursor-pointer hover:bg-slate-50/50 dark:hover:bg-slate-850/40 transition-colors group"
                     onclick="window.location='{{ route('jadwal.show', $item->id) }}'">
                    <div>
                        <h3 class="text-lg font-black text-slate-900 dark:text-white group-hover:text-emerald-600 transition-colors">
                            {{ $item->nama_kegiatan }}
                        </h3>
                    </div>

                    <div class="grid grid-cols-2 gap-3 bg-slate-50 dark:bg-slate-950/40 p-4 rounded-2xl border border-slate-100 dark:border-slate-850">
                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400 dark:text-slate-500 flex items-center gap-1 mb-0.5">
                                <i data-lucide="calendar" class="w-3 h-3"></i> Tanggal
                            </p>
                            <p class="text-xs font-bold text-slate-700 dark:text-slate-300">
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400 dark:text-slate-500 flex items-center gap-1 mb-0.5">
                                <i data-lucide="clock" class="w-3 h-3"></i> Waktu
                            </p>
                            <p class="text-xs font-black text-emerald-600 dark:text-emerald-400">
                                {{ $item->waktu }}
                            </p>
                        </div>
                    </div>

                    <div class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1.5 pl-1">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-slate-400"></i>
                        <span>{{ $item->lokasi }}</span>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center bg-white dark:bg-slate-900 flex flex-col items-center justify-center">
                    <i data-lucide="calendar-x" class="w-10 h-10 text-slate-300 dark:text-slate-700 mb-2"></i>
                    <p class="text-slate-400 dark:text-slate-500 text-sm">Belum ada jadwal ibadah.</p>
                </div>
            @endforelse
        </div>

        <!-- 3. PAGINATION -->
        @if($jadwal->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $jadwal->links() }}
            </div>
        @endif

    </div>

    <!-- Script Re-inisialisasi Ikon Otomatis -->
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</x-app-layout>