<x-app-layout>
    <script src="https://unpkg.com/lucide@latest"></script>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="mb-14 relative">
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none dark:bg-indigo-500/5"></div>
            
            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest bg-indigo-50 dark:bg-indigo-950/50 px-4 py-2 rounded-full border border-indigo-100/50 dark:border-indigo-900/30">
                <i data-lucide="newspaper" class="w-3.5 h-3.5"></i> News
            </span>
            <h1 class="text-4xl sm:text-5xl font-black text-slate-950 dark:text-white tracking-tight mt-5 mb-4">
                Warta <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Jemaat</span>
            </h1>
            <p class="text-slate-600 dark:text-slate-400 font-normal max-w-2xl text-base sm:text-lg leading-relaxed">
                Temukan rilis berita aktual, pengumuman penting, dokumen jemaat, dan artikel rohani seputar pelayanan komunitas gereja kita.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200/60 dark:border-slate-800/80 shadow-sm hover:shadow-xl hover:shadow-indigo-500/5 dark:hover:shadow-none hover:-translate-y-1.5 transition-all duration-300 flex flex-col">

                    <div class="h-56 bg-slate-100 dark:bg-slate-800 overflow-hidden relative flex-shrink-0">
                        <span class="absolute top-4 left-4 z-20 inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-white/95 dark:bg-slate-900/95 backdrop-blur shadow-sm text-[10px] font-bold uppercase text-slate-800 dark:text-slate-200 tracking-wider">
                            <i data-lucide="bookmark" class="w-3 h-3 text-indigo-500"></i> News
                        </span>

                        <img 
                            src="{{ $post->gambar_url }}"
                            alt="{{ $post->judul }}"
                            class="w-full h-full object-cover group-hover:scale-105 group-hover:brightness-95 transition-all duration-700 ease-out"
                            onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden'); this.nextElementSibling.classList.add('flex');"
                        >

                        <div class="hidden absolute inset-0 items-center justify-center bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-slate-800 dark:to-slate-850">
                            <div class="text-center p-4">
                                <i data-lucide="image" class="w-8 h-8 text-indigo-300 dark:text-slate-600 mx-auto mb-1.5"></i>
                                <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider block">Gereja Kristen</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 sm:p-7 flex flex-col flex-grow">
                        <div class="flex items-center gap-3 mb-3 text-xs text-slate-500 dark:text-slate-400 font-semibold tracking-wide">
                            <span class="flex items-center gap-1">
                                <i data-lucide="calendar" class="w-3.5 h-3.5 text-slate-400"></i>
                                {{ $post->created_at ? $post->created_at->translatedFormat('d M Y') : 'Baru saja' }}
                            </span>
                            <span class="text-slate-300 dark:text-slate-700">•</span>
                            <span class="flex items-center gap-1">
                                <i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i> 3 mnt baca
                            </span>
                        </div>

                        <h2 class="text-xl font-extrabold text-slate-950 dark:text-white mb-3 line-clamp-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors leading-snug tracking-tight">
                            {{ $post->judul }}
                        </h2>

                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed line-clamp-3 flex-grow mb-6">
                            {{ Str::limit(strip_tags($post->isi), 125) }}
                        </p>

                        <div class="pt-4 border-t border-slate-100 dark:border-slate-800/60 mt-auto">
                            <a href="{{ route('berita.show', $post->slug) }}"
                               class="inline-flex items-center justify-between text-indigo-600 dark:text-indigo-400 font-bold text-xs group/btn hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors w-full">
                                <span class="uppercase tracking-wider">Baca Selengkapnya</span>
                                <div class="w-8 h-8 rounded-xl bg-slate-50 dark:bg-slate-800 group-hover:bg-indigo-600 dark:group-hover:bg-indigo-500 group-hover:text-white transition-all flex items-center justify-center shadow-sm">
                                    <i data-lucide="chevron-right" class="w-4 h-4 transform group-hover/btn:translate-x-0.5 transition-transform"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                </article>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 px-4 text-center bg-slate-50 dark:bg-slate-900/40 rounded-2xl border-2 border-dashed border-slate-200 dark:border-slate-800">
                    <div class="w-14 h-14 bg-white dark:bg-slate-800 shadow-sm rounded-2xl flex items-center justify-center mb-4 text-slate-400 dark:text-slate-500">
                        <i data-lucide="file-text" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white mb-1">Belum Ada Warta Berita</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm max-w-xs">Kumpulan kabar sukacita dan artikel pelayanan jemaat akan muncul di sini.</p>
                </div>
            @endforelse
        </div>

        @if($posts->hasPages())
            <div class="mt-14 flex justify-center">
                {{ $posts->links() }}
            </div>
        @endif

    </div>

    <script>
        lucide.createIcons();
    </script>
</x-app-layout>