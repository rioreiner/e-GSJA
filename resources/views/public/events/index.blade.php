<x-app-layout>
    <!-- Include Lucide Icons di bagian atas halaman -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- 1. HEADER HALAMAN EVENT -->
        <div class="mb-14 relative">
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl pointer-events-none dark:bg-purple-500/5"></div>
            
            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-purple-600 dark:text-purple-400 uppercase tracking-widest bg-purple-50 dark:bg-purple-950/50 px-4 py-2 rounded-full border border-purple-100/50 dark:border-purple-900/30">
                <i data-lucide="calendar-range" class="w-3.5 h-3.5"></i> Kalender Kegiatan
            </span>

            <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white tracking-tight mt-5 mb-4">
                Event <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Gereja</span>
            </h1>

            <p class="text-slate-500 dark:text-slate-400 font-light max-w-2xl text-base sm:text-lg leading-relaxed">
                Ikuti berbagai program, seminar rohani, hari raya besar, dan aksi sosial pelayanan komunitas jemaat kami.
            </p>
        </div>

        <!-- 2. GRID EVENT UTAMA -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($events as $event)
                @php
                    $image = $event->gambar_url;
                    $eventDate = \Carbon\Carbon::parse($event->tanggal);
                @endphp

                <div class="group bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-100 dark:border-slate-800/60 overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-purple-500/5 dark:hover:shadow-none hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">

                    <!-- GAMBAR EVENT & BADGE MENGAPUNG -->
                    <div class="relative h-56 w-full bg-slate-100 dark:bg-slate-800 overflow-hidden">
                        
                        <!-- Premium Floating Date Badge -->
                        <div class="absolute top-4 left-4 z-20 flex flex-col items-center justify-center w-12 h-14 rounded-2xl bg-white/95 dark:bg-slate-900/95 backdrop-blur shadow-md border border-white/20 dark:border-slate-800 text-slate-800 dark:text-slate-200">
                            <span class="text-[10px] uppercase tracking-wider font-extrabold text-purple-600 dark:text-purple-400">{{ $eventDate->translatedFormat('M') }}</span>
                            <span class="text-xl font-black leading-none mt-0.5">{{ $eventDate->format('d') }}</span>
                        </div>

                        <!-- Status Badge (Upcoming / Selesai) -->
                        <div class="absolute top-4 right-4 z-20">
                            @if(isset($event->tanggal) && $eventDate->isFuture())
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-extrabold uppercase tracking-wider bg-emerald-500 text-white rounded-lg shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> Upcoming
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 text-[10px] font-extrabold uppercase tracking-wider bg-slate-800/80 text-slate-300 backdrop-blur rounded-lg shadow-sm">
                                    Event
                                </span>
                            @endif
                        </div>

                        @if($image)
                            <img 
                                src="{{ $image }}"
                                alt="{{ $event->nama_event }}"
                                class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-700 ease-out"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >

                            <!-- Fallback Placeholder Otomatis -->
                            <div class="hidden absolute inset-0 items-center justify-center bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-slate-800 dark:to-slate-850">
                                <div class="text-center p-4">
                                    <i data-lucide="image" class="w-8 h-8 text-purple-300 dark:text-slate-600 mx-auto mb-1"></i>
                                    <span class="text-[10px] font-medium text-slate-400">Gereja Kristen</span>
                                </div>
                            </div>
                        @else
                            <!-- Fallback jika data memang bernilai null di database -->
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-purple-50 to-indigo-50 dark:from-slate-800 dark:to-slate-850">
                                <i data-lucide="sparkles" class="w-10 h-10 text-purple-300 dark:text-slate-600 mb-1"></i>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Fellowship</span>
                            </div>
                        @endif

                        <!-- Gradasi Masking Tipis -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 via-transparent to-transparent"></div>
                    </div>

                    <!-- CONTENT INFO -->
                    <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <!-- JUDUL EVENT -->
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors leading-snug line-clamp-2">
                                {{ $event->nama_event }}
                            </h2>

                            <!-- DESKRIPSI -->
                            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed line-clamp-3 mb-6">
                                {{ Str::limit($event->deskripsi ?? 'Tidak ada deskripsi info lebih lanjut mengenai kegiatan ini.', 120) }}
                            </p>
                        </div>

                        <!-- METADATA DETAIL & TOMBOL ACTION (Bawah Kartu) -->
                        <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800/60 text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400">
                            <div class="flex items-center gap-2.5">
                                <div class="w-5 h-5 rounded-md bg-slate-50 dark:bg-slate-800 flex items-center justify-center text-purple-500">
                                    <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                </div>
                                <span>{{ $eventDate->translatedFormat('l, d F Y') }}</span>
                            </div>

                            <div class="flex items-center gap-2.5">
                                <div class="w-5 h-5 rounded-md bg-slate-50 dark:bg-slate-800 flex items-center justify-center text-purple-500">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                                </div>
                                <span class="truncate max-w-[220px] sm:max-w-none" title="{{ $event->lokasi ?? 'Lokasi Belum Ditentukan' }}">
                                    {{ $event->lokasi ?? 'Lokasi Internal Gereja' }}
                                </span>
                            </div>

                            {{-- ADDED: Tombol Baca Selengkapnya / Detail Event --}}
                            <div class="pt-2">
                                <a href="{{ route('events.show', $event->id) }}"
                                   class="inline-flex items-center justify-between text-purple-600 dark:text-purple-400 font-bold text-xs group/btn hover:text-purple-500 transition-colors w-full">
                                    <span>Lihat Detail Event</span>
                                    <div class="w-7 h-7 rounded-lg bg-slate-50 dark:bg-slate-800 group-hover:bg-purple-600 dark:group-hover:bg-purple-500 group-hover:text-white transition-all flex items-center justify-center shadow-sm">
                                        <i data-lucide="chevron-right" class="w-4 h-4 transform group-hover/btn:translate-x-0.5 transition-transform"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <!-- Tampilan Jika Kosong -->
                <div class="col-span-full flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-50 dark:bg-slate-900/40 rounded-[2rem] border-2 border-dashed border-slate-200 dark:border-slate-800">
                    <div class="w-14 h-14 bg-white dark:bg-slate-800 shadow-md rounded-2xl flex items-center justify-center mb-4 text-slate-400 dark:text-slate-500">
                        <i data-lucide="calendar-x" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white mb-1">Belum Ada Agenda Terjadwal</h3>
                    <p class="text-slate-400 dark:text-slate-500 text-sm max-w-xs">Silakan hubungi sekretariat jemaat atau kembali berkunjung dalam beberapa waktu ke depan.</p>
                </div>
            @endforelse
        </div>

        <!-- 3. PAGINATION -->
        @if($events->hasPages())
            <div class="mt-14 flex justify-center">
                {{ $events->links() }}
            </div>
        @endif

    </div>

    <!-- Script Re-inisialisasi Ikon Otomatis -->
    <script>
        lucide.createIcons();
    </script>
</x-app-layout>