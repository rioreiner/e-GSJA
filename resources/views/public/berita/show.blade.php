<x-app-layout>
    <!-- Include Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Include SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">

        <div id="progress-bar" class="fixed top-0 left-0 h-1.5 bg-indigo-600 z-[9999] transition-all duration-200" style="width: 0%;"></div>
        
        <!-- Tombol Kembali -->
        <div class="flex items-center justify-between">
            <a href="{{ route('berita.index') }}" class="group inline-flex items-center gap-2 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 flex items-center justify-center group-hover:border-indigo-500 transition-colors shadow-sm">
                    <i data-lucide="arrow-left" class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform"></i>
                </div>
                Kembali ke Berita
            </a>
            
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 text-xs font-bold uppercase tracking-wider">
                Warta Jemaat
            </span>
        </div>

        <!-- BAGIAN UTAMA ARTIKEL -->
        <article class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-100 dark:border-slate-800/60 shadow-xl shadow-slate-200/40 dark:shadow-none overflow-hidden">

            <div class="w-full h-[320px] sm:h-[420px] bg-slate-100 dark:bg-slate-800 relative overflow-hidden">
                <img src="{{ $post->gambar_url }}" alt="{{ $post->judul }}" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="hidden absolute inset-0 items-center justify-center bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-slate-800 dark:to-slate-850">
                    <div class="text-center p-4">
                        <i data-lucide="image" class="w-12 h-12 text-indigo-200 dark:text-slate-700 mx-auto mb-2"></i>
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-10 md:p-12 space-y-6">
                <div class="space-y-4 border-b border-slate-100 dark:border-slate-800 pb-6">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight leading-tight">
                        {{ $post->judul }}
                    </h1>
                </div>

                <div class="prose prose-slate dark:prose-invert max-w-none">
                    {!! $post->isi !!}
                </div>
            </div>
        </article>

        <!-- FOOTER ARTIKEL: Salin Link dengan SweetAlert -->
        <div class="p-6 bg-slate-50 dark:bg-slate-900/60 border border-slate-100 dark:border-slate-800 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div>
                <h4 class="text-sm font-bold text-slate-900 dark:text-white">Bagikan Kabar Sukacita</h4>
                <p class="text-xs text-slate-400 mt-0.5">Salin tautan halaman ini untuk membagikannya ke grup persekutuan Anda.</p>
            </div>
            
            <button onclick="copyToClipboard()" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-bold rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-indigo-50 dark:hover:bg-indigo-950/30 hover:text-indigo-600 dark:hover:text-indigo-400 shadow-sm transition-all">
                <i data-lucide="copy" class="w-3.5 h-3.5"></i> Salin Link
            </button>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // Fungsi Salin dengan SweetAlert
        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Tautan Disalin!',
                    text: 'Tautan berhasil disalin ke papan klip Anda.',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true,
                    position: 'top-end',
                    background: '#fff',
                    color: '#334155'
                });
            });
        }

        // Progress Bar logic
        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("progress-bar").style.width = scrolled + "%";
        };
    </script>
</x-app-layout>