<x-app-layout>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="relative min-h-screen bg-slate-50/50 dark:bg-slate-950/20 py-12">
        <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-indigo-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="progress-bar" class="fixed top-0 left-0 h-1.5 bg-indigo-600 z-[9999] transition-all duration-200" style="width: 0%;"></div>
            
            <div class="mb-8">
                <a href="{{ route('events.index') }}" 
                   class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700 hover:text-purple-600 dark:text-slate-300 dark:hover:text-purple-400 transition-colors group">
                    <div class="w-8 h-8 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 flex items-center justify-center group-hover:-translate-x-1 transition-transform shadow-sm">
                        <i data-lucide="chevron-left" class="w-4 h-4 text-slate-600 dark:text-slate-400"></i>
                    </div>
                    <span>Kembali ke Kalender</span>
                </a>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-200/80 dark:border-slate-800/80 shadow-xl shadow-slate-200/40 dark:shadow-none overflow-hidden">
                
                <div class="relative h-80 sm:h-96 md:h-[30rem] w-full bg-slate-900 overflow-hidden">
                    @if($event->gambar_url)
                        <img src="{{ $event->gambar_url }}" alt="{{ $event->nama_event }}" class="w-full h-full object-cover opacity-90 dark:opacity-85" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden absolute inset-0 items-center justify-center bg-gradient-to-br from-purple-700 via-indigo-800 to-slate-900">
                            <div class="text-center p-6 text-white/90">
                                <i data-lucide="church" class="w-16 h-16 mx-auto mb-3 text-purple-300"></i>
                                <p class="text-sm uppercase tracking-widest font-black">Warta Kegiatan Jemaat</p>
                            </div>
                        </div>
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-purple-700 via-indigo-800 to-slate-900">
                            <i data-lucide="sparkles" class="w-16 h-16 text-white/20 mb-3"></i>
                        </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-10 z-10 space-y-3">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-purple-600 text-white text-xs font-bold uppercase tracking-wider shadow-md">
                            <i data-lucide="tag" class="w-3 h-3"></i> Agenda Kegiatan
                        </span>
                        <h1 class="text-2xl sm:text-4xl md:text-5xl font-black text-white tracking-tight leading-tight max-w-4xl drop-shadow-[0_4px_12px_rgba(0,0,0,0.85)]">
                            {{ $event->nama_event }}
                        </h1>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-6 sm:p-10">
                    <div class="lg:col-span-2 space-y-6">
                        <div class="border-b border-slate-100 dark:border-slate-800 pb-4">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-1">Rincian Acara</h3>
                        </div>
                        <div class="prose prose-slate dark:prose-invert max-w-none">
                            <p class="text-slate-800 dark:text-slate-200 text-base sm:text-lg leading-relaxed whitespace-pre-line">{{ $event->deskripsi ?? 'Informasi kegiatan belum tersedia.' }}</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-slate-50 dark:bg-slate-900 border-2 border-slate-200/80 dark:border-slate-800 rounded-[2rem] p-6 sm:p-8 space-y-6 shadow-sm">
                            <h4 class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-widest border-b-2 border-slate-200 dark:border-slate-800 pb-3">Waktu & Tempat</h4>
                            
                            @php $date = \Carbon\Carbon::parse($event->tanggal); @endphp
                            <div class="flex gap-4 items-start">
                                <div class="w-10 h-10 rounded-xl bg-purple-600 text-white flex items-center justify-center shrink-0 shadow-md">
                                    <i data-lucide="calendar" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <h5 class="text-[11px] font-extrabold text-slate-600 dark:text-slate-400 uppercase tracking-wider">Hari & Tanggal</h5>
                                    <p class="text-base font-black text-slate-900">{{ $date->translatedFormat('l, d F Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 rounded-[2rem] bg-gradient-to-br from-indigo-700 via-indigo-600 to-purple-600 text-white space-y-4 relative overflow-hidden shadow-lg">
                            <h5 class="text-sm font-black uppercase tracking-wider">Undang Kerabat</h5>
                            <button onclick="copyEventLink()" 
                                    class="w-full py-3 px-4 bg-white hover:bg-slate-100 text-slate-900 rounded-xl text-xs font-bold flex items-center justify-center gap-2 transition-all active:scale-95 shadow-md">
                                <i data-lucide="share-2" class="w-3.5 h-3.5 text-purple-600"></i> Salin Link Acara
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // Fungsi Salin dengan SweetAlert2
        function copyEventLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Tautan Disalin!',
                    text: 'Link acara sudah siap dibagikan.',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true,
                    position: 'top-end',
                    iconColor: '#7c3aed'
                });
            });
        }

        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("progress-bar").style.width = scrolled + "%";
        };
    </script>
</x-app-layout>