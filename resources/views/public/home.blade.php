<x-app-layout>
    <!-- Include CSS Tambahan untuk UI Premium via Slot/Header Layout -->
    <x-slot name="header">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-24">
        
        <!-- ================= SECTION: VISI & MISI (GSJS STYLE - MINIMALIST & BOLD) ================= -->
        <section class="py-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Sisi Kiri: Pernyataan Bold & Besar (Khas GSJS) + INTEGRATED LOGO -->
                <div class="lg:col-span-5 space-y-5">
                    <!-- Integrasi Logo GSJA yang Selaras dengan Tema Minimalis -->
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/gsja.png') }}" alt="Logo GSJA" class="h-8 w-auto object-contain dark:brightness-100 dark:contrast-125 opacity-100">
                        <div class="h-4 w-px bg-slate-400 dark:bg-slate-700"></div>
                        <p class="text-xs font-black tracking-[0.3em] text-indigo-700 dark:text-indigo-400 uppercase">
                            VISION & MISSION
                        </p>
                    </div>

                    <h2 class="text-4xl md:text-5xl font-black tracking-tighter text-slate-900 dark:text-white leading-none">
                        LOVED.<br>
                        CHANGED.<br>
                        SENT.
                    </h2>
                    <p class="text-slate-700 dark:text-slate-400 text-sm font-normal leading-relaxed pt-2 max-w-sm">
                        Kami rindu melihat setiap orang mengalami kasih Kristus, dipulihkan hidupnya, dan diutus untuk memberkati dunia.
                    </p>
                </div>

                <!-- Sisi Kanan: Detail Grid Minimalis (Tanpa Ikon/Ornamen Ramai) -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-10 border-t lg:border-t-0 lg:border-l border-slate-300 dark:border-slate-800 pt-8 lg:pt-0 lg:pl-12">
                    <div>
                        <h3 class="text-xs font-black tracking-widest text-slate-600 dark:text-slate-500 uppercase mb-2">01 / VISI KAMI</h3>
                        <p class="text-base font-bold text-slate-900 dark:text-slate-200 leading-snug">
                            Menjadi komunitas iman yang hidup, relevan bagi zaman, dan menghadirkan kerajaan Allah di bumi.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-xs font-black tracking-widest text-slate-600 dark:text-slate-500 uppercase mb-2">02 / INTIMACY</h3>
                        <p class="text-sm font-bold text-slate-900 dark:text-slate-200 leading-snug">
                            Mendorong jemaat untuk membangun relasi personal yang mendalam dengan Tuhan melalui penyembahan dan doa.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-xs font-black tracking-widest text-slate-600 dark:text-slate-500 uppercase mb-2">03 / COMMUNITY</h3>
                        <p class="text-sm font-bold text-slate-900 dark:text-slate-200 leading-snug">
                            Menyediakan wadah sel atau komunitas kecil tempat setiap jiwa bertumbuh bersama, diperhatikan, dan dikasihi.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-xs font-black tracking-widest text-slate-600 dark:text-slate-500 uppercase mb-2">04 / DISCIPLESHIP</h3>
                        <p class="text-sm font-bold text-slate-900 dark:text-slate-200 leading-snug">
                            Melatih serta memuridkan jemaat agar siap diutus menjadi berkat yang berdampak di lingkungan profesional maupun keluarga.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= SECTION: AYAT EMAS / PASTORAL VERSE (GSJS STYLE WITH IMAGE BACKGROUND) ================= -->
        <section class="relative py-20 rounded-[2.5rem] overflow-hidden border border-slate-300 dark:border-slate-800/60 shadow-lg bg-cover bg-center transition-all duration-500
            bg-[url('https://plus.unsplash.com/premium_photo-1664006989166-7127bf13336f?q=80&w=774&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')]">
            
            <!-- Overlay Multi-Layer Semitransparan (Memastikan teks tetap super kontras dan mudah dibaca) -->
            <div class="absolute inset-0 bg-gradient-to-b from-white/90 via-white/85 to-white/90 dark:from-slate-950/90 dark:via-slate-950/85 dark:to-slate-950/90 backdrop-blur-[2px] z-0"></div>
            
            <!-- Ambient Glow Effect Tambahan di Tengah -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[250px] bg-indigo-500/[0.08] dark:bg-indigo-500/[0.03] rounded-full blur-3xl pointer-events-none z-0"></div>

            <div class="relative z-10 max-w-4xl mx-auto text-center space-y-6 px-6 sm:px-8">
                <!-- Badge Kategori Minimalis -->
                <span class="inline-flex items-center gap-1.5 text-[10px] font-black text-indigo-700 dark:text-indigo-400 uppercase tracking-[0.25em] bg-white/80 dark:bg-slate-900 border border-indigo-300 dark:border-slate-800 px-3 py-1.5 rounded-xl shadow-sm mx-auto backdrop-blur-sm">
                    <i data-lucide="book-open" class="w-3.5 h-3.5"></i> Verse of the Week
                </span>

                <!-- Konten Ayat dengan Tipografi Bold, Besar & Shadow Halus -->
                <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-100 leading-relaxed max-w-3xl mx-auto font-serif italic drop-shadow-[0_2px_4px_rgba(255,255,255,0.8)] dark:drop-shadow-[0_2px_8px_rgba(0,0,0,0.5)]">
                    "Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan."
                </h2>

                <!-- Referensi Kitab -->
                <div class="flex items-center justify-center gap-3 pt-2">
                    <div class="h-px w-8 bg-slate-400/60 dark:bg-slate-700"></div>
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-800 dark:text-slate-300">
                        Yeremia 29:11 <span class="text-slate-400 dark:text-slate-600 font-normal mx-1.5">|</span> TB
                    </p>
                    <div class="h-px w-8 bg-slate-400/60 dark:bg-slate-700"></div>
                </div>
            </div>
        </section>

        <!-- 1. FEATURED CAROUSEL / SLIDER (Sorotan Utama - Maksimal 2 Berita) -->
        @if($posts->count() > 0)
        <div class="relative rounded-3xl overflow-hidden shadow-xl bg-slate-950 text-white group">
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": 5000, "wrapAround": true, "prevNextButtons": true, "pageDots": true }'>
                @foreach($posts->take(2) as $featured)
                <div class="w-full min-h-[440px] md:h-[500px] relative flex items-end p-8 md:p-16">
                    <!-- Overlay Gradasi Gelap Sinematik -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-slate-900/20 z-10"></div>
                    
                    <img src="{{ !empty($featured->gambar) ? asset('uploads/gambar/' . $featured->gambar) : asset('images/default-news.jpg') }}" 
                         class="absolute inset-0 w-full h-full object-cover opacity-60 transform scale-100 group-hover:scale-102 transition duration-1000 ease-out" alt="{{ $featured->judul }}">
                    
                    <div class="relative z-20 max-w-3xl space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-500/30 border border-indigo-400/40 backdrop-blur-md text-indigo-200 text-xs font-bold tracking-wide uppercase">
                            <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span> Warta Jemaat
                        </span>
                        <h2 class="text-2xl md:text-5xl font-extrabold tracking-tight leading-tight drop-shadow-sm">
                            {{ $featured->judul }}
                        </h2>
                        <p class="text-slate-200 text-sm md:text-base font-normal line-clamp-2 max-w-2xl leading-relaxed">
                            {{ Str::limit(strip_tags($featured->isi), 160) }}
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('berita.show', $featured->slug) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg shadow-indigo-600/30 hover:shadow-indigo-600/10">
                                Baca Selengkapnya <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- 2. AGENDA & JADWAL (Grid Layout 50:50 yang Adaptif & Tertata Rapi) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">

            <!-- Kiri: Jadwal Ibadah -->
<div id="jadwal" class="relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-slate-100/80 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 rounded-3xl shadow-md border border-slate-300 dark:border-slate-800/80 p-6 md:p-8 scroll-mt-8 min-h-[400px] flex flex-col justify-between">
    <!-- Glow effect halus di latar belakang -->
    <div class="absolute top-0 right-0 w-40 h-40 bg-indigo-500/[0.05] dark:bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>
    
    <div class="w-full">
        <!-- Header Title: Tertata Rapi & Konsisten -->
        <div class="relative z-10 mb-6 pb-4 border-b border-slate-300 dark:border-white/5">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-200/80 dark:bg-white/[0.04] border border-slate-300 dark:border-white/[0.06] backdrop-blur-md text-indigo-700 dark:text-indigo-300 text-[11px] font-black tracking-widest uppercase mb-2">
                <i data-lucide="calendar-days" class="w-3.5 h-3.5"></i> Service Schedule
            </span>
            <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">
                Jadwal Ibadah Raya
            </h2>
            <p class="text-xs text-slate-600 dark:text-slate-400 mt-1 font-medium">
                Mari bersekutu dan memuji Tuhan bersama seluruh jemaat.
            </p>
        </div>

        <!-- List Content: Spasi & Padding Item Teratur -->
        <div class="space-y-4 relative z-10">
            @forelse($jadwal as $item)
                <div class="group flex items-start sm:items-center gap-4 p-4 rounded-2xl bg-white dark:bg-white/[0.02] hover:bg-slate-100 dark:hover:bg-white/[0.05] border border-slate-300 dark:border-transparent hover:border-slate-400 dark:hover:border-white/5 shadow-sm transition-all duration-200">
                    
                    <!-- Badge Kalender Visual (Kokoh & Flex-Shrink-0) -->
                    <div class="flex flex-col items-center justify-center w-12 h-12 rounded-xl bg-indigo-100 dark:bg-indigo-500/10 text-indigo-700 dark:text-indigo-300 border border-indigo-300 dark:border-indigo-500/20 shrink-0 shadow-sm">
                        <span class="text-[10px] uppercase tracking-wider font-black leading-none">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M') }}</span>
                        <span class="text-lg font-black leading-none mt-1">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</span>
                    </div>

                    <!-- Detail Info Text -->
                    <div class="overflow-hidden flex-1 min-w-0">
                        <h4 class="font-extrabold text-slate-900 dark:text-white text-sm sm:text-base mb-1 truncate group-hover:text-indigo-700 dark:group-hover:text-indigo-400 transition-colors">
                            {{ $item->nama_kegiatan }}
                        </h4>
                        <p class="text-xs text-slate-700 dark:text-slate-400 font-medium flex items-center gap-1.5">
                            <i data-lucide="clock" class="w-3.5 h-3.5 text-indigo-600 dark:text-indigo-400"></i> 
                            <span>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, H:i') }} WIB</span>
                        </p>
                    </div>

                </div>
            @empty
                <!-- Tampilan Jika Kosong -->
                <div class="text-center py-12 bg-slate-100 dark:bg-white/[0.02] rounded-2xl border border-slate-300 dark:border-white/5">
                    <i data-lucide="calendar-x" class="w-8 h-8 text-slate-500 dark:text-slate-600 mx-auto mb-2"></i>
                    <p class="text-slate-700 dark:text-slate-400 font-bold text-sm">Belum ada jadwal ibadah terdekat.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

            <!-- Kanan: Event Gereja -->
            <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-md border border-slate-300 dark:border-slate-800/60 p-6 md:p-8 min-h-[400px] flex flex-col">
                
                <!-- Title Style: Integrated Glassmorphism Light/Dark -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-4 border-b border-slate-300 dark:border-slate-800">
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-200/80 dark:bg-slate-950 border border-slate-300 dark:border-slate-800/80 backdrop-blur-md text-amber-800 dark:text-amber-400 text-[11px] font-black tracking-widest uppercase mb-2">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Upcoming Events
                        </span>
                        <h2 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">
                            Event Mendatang
                        </h2>
                        <p class="text-xs text-slate-600 dark:text-slate-400 mt-1 font-medium">Rangkaian kegiatan dan persekutuan kategorial.</p>
                    </div>
                    <a href="{{ route('events.index') }}" class="self-start sm:self-center text-xs font-black text-indigo-700 dark:text-indigo-400 hover:text-indigo-600 transition-colors bg-slate-100 dark:bg-slate-800 border border-slate-300 dark:border-transparent px-3 py-1.5 rounded-lg">
                        Lihat Semua
                    </a>
                </div>

                <div class="space-y-4 relative pl-1 flex-grow">
                    <!-- Line Timeline -->
                    <div class="absolute left-3.5 top-2 bottom-2 w-0.5 bg-slate-200 dark:bg-slate-800"></div>

                    @forelse($events as $event)
                        <div class="relative pl-7 group">
                            <!-- Bullet Titik -->
                            <div class="absolute left-2 top-2 w-2.5 h-2.5 rounded-full bg-slate-400 dark:bg-slate-700 group-hover:bg-indigo-600 border-2 border-white dark:border-slate-900 shadow-sm transition-colors duration-200"></div>
                            
                            <div class="bg-slate-50 dark:bg-slate-950/40 p-3.5 rounded-2xl border border-slate-300 dark:border-slate-800/40 group-hover:bg-indigo-50 dark:group-hover:bg-indigo-950/20 transition-all">
                                <span class="inline-flex items-center gap-1 text-[11px] font-black text-indigo-700 dark:text-indigo-400 mb-1">
                                    <i data-lucide="calendar" class="w-3 h-3"></i> {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}
                                </span>
                                <h4 class="font-extrabold text-slate-900 dark:text-slate-200 text-sm leading-snug group-hover:text-indigo-700 dark:group-hover:text-indigo-400 transition-colors">
                                    {{ $event->nama_event }}
                                </h4>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-slate-50 dark:bg-slate-950/20 rounded-2xl border border-dashed border-slate-300 dark:border-slate-800">
                            <i data-lucide="sparkles" class="w-8 h-8 text-slate-400 mx-auto mb-2"></i>
                            <p class="text-slate-600 dark:text-slate-400 font-medium text-sm">Belum ada agenda spesial.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- 3. SECTION: PROFIL GEMBALA SIDANG (PREMIUM TRANSPARENT ARTWORK & TYPOGRAPHY) -->
        <section class="relative py-16 bg-gradient-to-b from-slate-100 via-slate-50 to-slate-100/90 dark:from-slate-950/40 dark:to-slate-950/80 rounded-[2.5rem] border border-slate-300 dark:border-slate-800/50 overflow-hidden backdrop-blur-sm shadow-sm">
            <!-- Glow Latar Belakang Elegan -->
            <div class="absolute -top-12 -left-12 w-[400px] h-[400px] bg-emerald-500/[0.06] dark:bg-emerald-500/[0.02] rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-12 -right-12 w-[400px] h-[400px] bg-indigo-500/[0.06] dark:bg-indigo-500/[0.02] rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 relative">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                    
                    <!-- KOLOM KIRI: FOTO TRANSPARAN / CLEAN BLENDED ARTWORK -->
                    <div class="lg:col-span-5 flex justify-center lg:justify-start">
                        <div class="relative w-full max-w-sm lg:max-w-md group">
                            <!-- Efek Ring Cahaya Halus di Belakang Foto -->
                            <div class="absolute inset-4 rounded-[2rem] bg-gradient-to-tr from-emerald-500/20 via-transparent to-indigo-500/20 blur-xl opacity-70 group-hover:opacity-100 transition duration-700"></div>
                            
                            <!-- Kontainer Foto Utama Transparan -->
                            <div class="relative aspect-[4/5] rounded-[2rem] overflow-hidden bg-transparent transition-all duration-500">
                                <img src="{{ asset('img/gembala/David Cross.jpg') }}" 
                                     alt="Gembala Sidang" 
                                     class="w-full h-full object-cover object-top mix-blend-normal dark:mix-blend-luminosity opacity-100 group-hover:scale-102 transition duration-700 filter contrast-[1.02]">
                                
                                <!-- Gradasi Transparan Halus untuk Menyatu dengan Latar Belakang Bawah -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-100 via-transparent to-transparent dark:from-slate-950 dark:via-transparent"></div>
                            </div>

                            <!-- Lencana Jabatan Floating Minimalis -->
                            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 bg-white/90 dark:bg-slate-900/60 border border-slate-300 dark:border-white/5 backdrop-blur-xl px-4 py-2 rounded-xl shadow-md flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-sm animate-pulse"></span>
                                <span class="text-[10px] font-black text-slate-900 dark:text-slate-200 uppercase tracking-widest">Lead Pastor</span>
                            </div>
                        </div>
                    </div>

                    <!-- KOLOM KANAN: TYPOGRAPHY MODERN & PREMIUM -->
                    <div class="lg:col-span-7 text-center lg:text-left flex flex-col justify-center lg:pl-8">
                        <!-- Glassmorphism Badge -->
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-[0.2em] bg-emerald-100 dark:bg-emerald-400/[0.05] border border-emerald-300 dark:border-emerald-500/10 backdrop-blur-md px-3.5 py-1.5 rounded-lg w-fit mx-auto lg:mx-0 mb-4">
                            <i data-lucide="heart-handshake" class="w-3.5 h-3.5"></i> Pastoral Message
                        </span>

                        <!-- Judul Nama Premium dengan Tekstur Gradasi Tipis -->
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-slate-900 dark:text-white leading-none mb-2">
                            Pdt. Reiner Rio, <span class="font-light text-slate-500 dark:text-slate-500">M.Th.</span>
                        </h2>
                        <!-- Subtitle dengan tracking ekstra luas -->
                        <p class="text-[11px] font-black text-slate-600 dark:text-slate-500 uppercase tracking-[0.15em] mb-8">
                            Bersama Ibu El Olsen <span class="text-slate-400 dark:text-slate-700 mx-2">|</span> Mata Jemaat
                        </p>

                        <!-- Blok Kutipan Modern -->
                        <div class="relative mb-8 max-w-xl mx-auto lg:mx-0 border-l-2 border-emerald-500 dark:border-emerald-500/20 pl-4 text-left">
                            <p class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-200 leading-relaxed tracking-wide">
                                “Gereja bukanlah sekadar gedung yang megah, melainkan sebuah keluarga tempat setiap jiwa yang terluka dipulihkan, dikuatkan, dan diutus kembali menjadi terang.”
                            </p>
                        </div>

                        <!-- Deskripsi Menggunakan Font Ringan & Proproporsional -->
                        <p class="text-slate-700 dark:text-slate-400 font-medium text-sm sm:text-base leading-relaxed tracking-wide max-w-xl mx-auto lg:mx-0 mb-8">
                            Sejak dipanggil melayani pada tahun 2015, beliau berkomitmen penuh untuk membimbing jemaat dalam pengenalan yang intim akan Kristus. Melalui pengajaran firman yang relevan, aplikatif, dan berpusat pada Injil, beliau rindu melihat setiap generasi mengalami transformasi hidup sejati.
                        </p>

                        <!-- Desain Tombol Premium Minimalis -->
                        <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                            <a href="{{ route('jadwal.index') }}" 
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-emerald-600 dark:bg-white dark:text-slate-950 dark:hover:bg-emerald-500 dark:hover:text-white text-white text-xs font-black rounded-xl shadow-md transition-all duration-300 group">
                                <i data-lucide="calendar" class="w-4 h-4 text-emerald-400 dark:text-emerald-600 group-hover:text-white transition-colors"></i>
                                <span>Bergabung Minggu Ini</span>
                            </a>
                            
                            <a href="https://wa.me/628123456789" 
                               target="_blank"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white hover:bg-slate-100 dark:bg-slate-900/40 dark:hover:bg-slate-900 text-slate-900 dark:text-slate-300 text-xs font-black rounded-xl border border-slate-300 dark:border-slate-800/80 backdrop-blur-sm transition-all duration-300">
                                <i data-lucide="message-circle" class="w-4 h-4 text-slate-600 dark:text-slate-400"></i>
                                <span>Konseling Pastoral</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= PEMBATAS SEPARATOR (DIVIDER) ================= -->
        <div class="max-w-4xl mx-auto px-1 my-2">
            <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent dark:via-slate-400/40"></div>
        </div>

        <!-- ================= SECTION: LOKASI GEGANA FULL MAP ================= -->
        <div class="my-24 max-w-6xl mx-auto px-4">
            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-300 dark:border-slate-800/80 p-6 sm:p-8 shadow-md flex flex-col gap-6 relative overflow-hidden">
                
                <!-- Bagian Judul & Header Section -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="max-w-xl">
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-black text-indigo-700 dark:text-indigo-400 uppercase tracking-widest bg-slate-100 dark:bg-slate-950 border border-slate-300 dark:border-slate-800/80 backdrop-blur-md px-3 py-1.5 rounded-xl mb-2 shadow-sm">
                            <i data-lucide="map-pin" class="w-5 h-5"></i> Lokasi Gereja
                        </span>
                        <h2 class="text-xl md:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                            Kunjungi Rumah Tuhan
                        </h2>
                        <p class="text-xs text-slate-700 dark:text-slate-400 mt-1 font-medium">Gereja Sidang Jemaat Allah (GSJA) Kota Tual.</p>
                    </div>
                    
                    <div class="shrink-0">
                        <a href="https://maps.app.goo.gl/xHfyDvfwdQPLY2Lc7" target="_blank" class="inline-flex items-center justify-center gap-2 py-3.5 px-6 bg-slate-900 hover:bg-indigo-600 dark:bg-slate-800 dark:hover:bg-indigo-600 text-white font-black text-xs rounded-2xl shadow-sm border border-slate-800 dark:border-slate-700 hover:border-indigo-500 transition-all group w-full sm:w-auto">
                            <i data-lucide="external-link" class="w-4 h-4 text-indigo-400 group-hover:text-white transition-colors"></i>
                            <span>Buka di Google Maps</span>
                        </a>
                    </div>
                </div>

                <!-- CONTAINER iFRAME MAPS FULL WIDTH -->
                <div class="w-full aspect-[16/10] sm:aspect-video lg:aspect-[21/9] bg-slate-100 dark:bg-slate-950 rounded-2xl overflow-hidden border border-slate-300 dark:border-slate-800/60 shadow-inner">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.521470006675!1d132.74850917315825!3d-5.637408155858042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d301bab5d652711%3A0xde55f8cf93660656!2sGereja%20Sidang%20Jemaat%20Allah%20(GSJA)%20Kota%20Tual!5e0!3m2!1sid!2sid!4v1779272120926!5m2!1sid!2sid" 
                        class="w-full h-full border-0 grayscale dark:invert-[0.9] dark:hue-rotate-180 contrast-[1.1] hover:grayscale-0 transition-all duration-500" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                
            </div>
        </div>

        <!-- SECTION CINEMATIC STREAMING & BROADCAST -->
<section class="relative py-24 bg-white dark:bg-slate-950 overflow-hidden">
    <!-- Dekorasi Background Pola Titik (Dot Matrix) yang Halus -->
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] dark:bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:24px_24px] opacity-70 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- KOLOM KIRI: VISUAL BANNER / CINEMATIC COVER (7 COLS) -->
            <div class="lg:col-span-7">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 dark:border-slate-800 bg-slate-900 aspect-[16/10] group">
                    <!-- Image Banner Utama (Ganti dengan foto suasana ibadah / tim media gereja Anda) -->
                    <img src="https://images.unsplash.com/photo-1528828085966-aff4e01c5f2b?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Suasana Ibadah Online" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 brightness-[0.4] dark:brightness-[0.3]">

                    <!-- Overlay Efek Gradasi Samping -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                    <!-- Floating Badge: Menampilkan Resolusi Tinggi -->
                    <div class="absolute top-6 left-6 flex items-center gap-2 px-3 py-1.5 rounded-xl bg-black/50 backdrop-blur-md border border-white/10 text-white text-[10px] font-bold tracking-widest uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Streaming
                    </div>

                    <!-- Konten Tengah Gambar (Tombol Play Besar) -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center">
                        <a href="https://youtube.com/@billy.d9032?si=t3S8uxQHDmyQg5td" target="_blank"
                           class="w-20 h-20 flex items-center justify-center rounded-full bg-indigo-600 text-white hover:bg-indigo-500 hover:scale-110 shadow-xl shadow-indigo-600/30 transition-all duration-300 group/play">
                            <i data-lucide="play" class="w-8 h-8 fill-current translate-x-0.5 group-hover/play:scale-105 transition-transform"></i>
                        </a>
                        <span class="text-xs font-bold text-white tracking-widest uppercase mt-4 block opacity-80">Saksikan Di YouTube</span>
                    </div>

                    <!-- Konten Mengapung Di Bawah Gambar -->
                    <div class="absolute bottom-6 left-6 right-6 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <!-- Mini Avatar / Logo Gereja -->
                            <div class="w-9 h-9 rounded-xl bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-white">
                                <i data-lucide="radio" class="w-4 h-4"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-xs font-bold text-white">GSJA Media Space</p>
                                <p class="text-[10px] text-slate-300">Live Production Team</p>
                            </div>
                        </div>
                        
                        <!-- Badge Total Viewers Simulasi -->
                        <div class="px-2.5 py-1 rounded-lg bg-white/10 backdrop-blur border border-white/10 text-[10px] font-medium text-slate-200">
                            Online Sanctuary
                        </div>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: JADWAL & CARD INFORMASI (5 COLS) -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <span class="text-xs font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest block mb-3">Digital Ministry</span>
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-950 dark:text-white tracking-tight leading-none mb-4">
                        Ibadah Kapan Saja, <br>Di Mana Saja.
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-light">
                        Jarak bukan lagi penghalang untuk bertumbuh. Di mana pun Anda berada, Anda dapat bergabung dalam ibadah mingguan kami melalui siaran digital yang dikemas secara profesional.
                    </p>
                </div>

                <!-- Card List Jadwal yang Bersih -->
                <div class="space-y-4">
                    <!-- Ibadah 1 -->
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200/60 dark:border-slate-800/80 flex items-center justify-between group hover:border-indigo-500/30 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-black text-sm">
                                01
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-white">Ibadah Umum (Pagi)</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Hari Minggu — Jam 08:00 WIT</p>
                            </div>
                        </div>
                        <i data-lucide="clock" class="w-4 h-4 text-slate-400 group-hover:text-indigo-500 transition-colors"></i>
                    </div>

                <!-- Tombol Aksi Utama -->
                <div class="pt-2 flex flex-col sm:flex-row items-center gap-4">
                    <a href="https://youtube.com/@billy.d9032?si=t3S8uxQHDmyQg5td" target="_blank"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-950 hover:bg-slate-900 dark:bg-white dark:hover:bg-slate-100 text-white dark:text-slate-950 rounded-xl text-xs font-bold tracking-wider uppercase transition shadow-lg shadow-slate-950/10 dark:shadow-none">
                        <i data-lucide="youtube" class="w-4 h-4 text-red-500 fill-current"></i>
                        Subscribe Channel
                    </a>
                    <a href="/jadwal" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white hover:bg-slate-50 dark:bg-slate-900 dark:hover:bg-slate-850 text-slate-700 dark:text-slate-300 rounded-xl text-xs font-bold border border-slate-200 dark:border-slate-800 transition">
                        Semua Kegiatan
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>  

        <!-- 4. SECTION: SOROTAN GALERI FOTO SLIDER -->
        <section class="space-y-6 pt-4">
            <div class="mb-4">
                <span class="inline-flex items-center gap-1.5 text-[11px] font-black text-indigo-700 dark:text-indigo-400 uppercase tracking-widest bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-800/80 backdrop-blur-md px-3 py-1.5 rounded-xl mb-2 shadow-sm">
                    <i data-lucide="images" class="w-3.5 h-3.5"></i> Church Media Gallery
                </span>
                <h2 class="text-xl md:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    Sorotan Suasana & Kegiatan Jemaat
                </h2>
                <p class="text-xs text-slate-700 dark:text-slate-400 mt-1 font-medium">Dokumentasi momen persekutuan, ibadah, dan pelayanan kasih.</p>
            </div>

            <!-- Flickity Multi-Image Carousel Dinamis -->
            <div class="gallery-carousel relative" data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true, "autoPlay": 4000, "prevNextButtons": false, "pageDots": true }'>
                @forelse($galeris as $galeri)
                    <div class="w-[280px] sm:w-[360px] mr-6 relative rounded-3xl overflow-hidden group shadow-sm bg-slate-900 aspect-[4/3]">
                        <img src="{{ asset('uploads/galeri/' . $galeri->foto) }}" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700 ease-out opacity-85 group-hover:opacity-100" 
                             alt="{{ $galeri->judul }}">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                            <span class="text-[10px] text-indigo-300 font-bold uppercase tracking-wider mb-1">Kegiatan</span>
                            <h4 class="text-white text-xs sm:text-sm font-bold line-clamp-2">
                                {{ $galeri->judul }}
                            </h4>
                        </div>
                    </div>
                @empty
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="w-[320px] mr-6 relative rounded-3xl overflow-hidden bg-slate-100 dark:bg-slate-900 aspect-[4/3] flex items-center justify-center border border-dashed border-slate-300 dark:border-slate-800">
                            <div class="text-center p-4">
                                <i data-lucide="image" class="w-6 h-6 text-slate-400 mx-auto mb-1"></i>
                                <span class="text-xs text-slate-600 dark:text-slate-400 font-bold block">Belum ada foto</span>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </section>

    </div>

    <!-- Inisialisasi Ikon Lucide secara otomatis -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</x-app-layout>