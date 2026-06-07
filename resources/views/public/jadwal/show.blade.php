<x-app-layout>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
        
        <div class="flex items-center justify-between">
            <a href="{{ route('jadwal.index') }}" class="group inline-flex items-center gap-2 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 flex items-center justify-center group-hover:border-emerald-500 transition-colors shadow-sm">
                    <i data-lucide="arrow-left" class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform"></i>
                </div>
                Kembali ke Jadwal
            </a>
            
            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-widest bg-emerald-50 dark:bg-emerald-950/50 px-3 py-1.5 rounded-md border border-emerald-100/50 dark:border-emerald-900/30">
                <i data-lucide="info" class="w-3.5 h-3.5"></i> Detail Ibadah
            </span>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-100 dark:border-slate-800/60 shadow-xl shadow-slate-200/40 dark:shadow-none overflow-hidden">
            <div class="p-6 sm:p-10 md:p-12 space-y-8">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-black text-slate-900 dark:text-white tracking-tight leading-tight">
                        {{ $jadwal->nama_kegiatan }}
                    </h1>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="p-5 bg-emerald-50/60 dark:bg-emerald-950/20 border border-emerald-100/40 dark:border-emerald-900/30 rounded-2xl flex items-start gap-3.5">
                        <div class="p-2 bg-white dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 rounded-xl shadow-sm">
                            <i data-lucide="calendar" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-extrabold text-emerald-600 dark:text-emerald-400">Tanggal</p>
                            <p class="text-slate-800 dark:text-slate-200 font-bold text-sm mt-0.5">
                                {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="p-5 bg-indigo-50/60 dark:bg-indigo-950/20 border border-indigo-100/40 dark:border-indigo-900/30 rounded-2xl flex items-start gap-3.5">
                        <div class="p-2 bg-white dark:bg-slate-800 text-indigo-600 dark:text-indigo-400 rounded-xl shadow-sm">
                            <i data-lucide="clock" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-extrabold text-indigo-600 dark:text-indigo-400">Waktu / Jam</p>
                            <p class="text-slate-800 dark:text-slate-200 font-bold text-sm mt-0.5">{{ $jadwal->waktu }}</p>
                        </div>
                    </div>

                    <div class="p-5 bg-purple-50/60 dark:bg-purple-950/20 border border-purple-100/40 dark:border-purple-900/30 rounded-2xl flex items-start gap-3.5 min-w-0">
                        <div class="p-2 bg-white dark:bg-slate-800 text-purple-600 dark:text-purple-400 rounded-xl shadow-sm shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-[10px] uppercase tracking-wider font-extrabold text-purple-600 dark:text-purple-400">Lokasi</p>
                            <p class="text-slate-800 dark:text-slate-200 font-bold text-sm mt-0.5 line-clamp-2 break-words">{{ $jadwal->lokasi }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div class="p-5 bg-slate-50 dark:bg-slate-950/40 border border-slate-200/60 dark:border-slate-800/80 rounded-2xl flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-md shadow-emerald-500/10">
                            <i data-lucide="user-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-extrabold text-slate-400 dark:text-slate-500">Pelayan Firman</p>
                            <p class="text-slate-900 dark:text-white font-black text-base mt-0.5">{{ $jadwal->pendeta ?? 'Akan Dikonfirmasi' }}</p>
                        </div>
                    </div>

                    <div class="p-5 bg-slate-50 dark:bg-slate-950/40 border border-slate-200/60 dark:border-slate-800/80 rounded-2xl flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white shadow-md shadow-indigo-500/10">
                            <i data-lucide="book-open-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider font-extrabold text-slate-400 dark:text-slate-500">Tema Khotbah</p>
                            <p class="text-slate-900 dark:text-white font-bold text-sm mt-0.5 italic">"{{ $jadwal->tema ?? 'Mempersiapkan Hati' }}"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 bg-slate-50 dark:bg-slate-900/60 border border-slate-100 dark:border-slate-800 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <h4 class="text-sm font-bold text-slate-900 dark:text-white">Ingatkan Jemaat Lain</h4>
                <p class="text-xs text-slate-400 mt-0.5">Salin teks ringkasan jadwal untuk dibagikan.</p>
            </div>
            <button onclick="copyJadwalRingkas()" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-bold rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-all">
                <i data-lucide="copy" class="w-3.5 h-3.5"></i> Salin Info Jadwal
            </button>
        </div>
    </div>

    <script>
        function copyJadwalRingkas() {
            const teks = `Mari Hadiri!\n\n⛪ Kegiatan: {{ $jadwal->nama_kegiatan }}\n🎙️ Pelayan: {{ $jadwal->pendeta ?? '-' }}\n📖 Tema: "{{ $jadwal->tema ?? '-' }}"\n📅 Tanggal: {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}\n⏰ Waktu: {{ $jadwal->waktu }}\n📍 Lokasi: {{ $jadwal->lokasi }}\n\nTuhan Yesus Memberkati.`;
            
            navigator.clipboard.writeText(teks).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil disalin!',
                    text: 'Informasi jadwal telah disalin ke papan klip.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    iconColor: '#10b981'
                });
            });
        }
        
        lucide.createIcons();
    </script>
</x-app-layout>