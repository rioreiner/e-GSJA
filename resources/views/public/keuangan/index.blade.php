<x-app-layout>
    <!-- Include Alpine.js untuk kontrol Modal -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <div x-data="{ openTransferModal: false, activeTab: 'persepuluhan' }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">
        
        <!-- 1. HEADER HALAMAN TRANSPARANSI + TOMBOL PERSEMBAHAN ELEGAN -->
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none dark:bg-indigo-500/5"></div>
            
            <div class="flex-1">
                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest bg-indigo-50 dark:bg-indigo-950/50 px-3 py-1.5 rounded-full border border-indigo-100/50 dark:border-indigo-900/30">
                    <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> Akuntabilitas Publik
                </span>
                <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white tracking-tight mt-4 mb-3">
                    Transparansi <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Keuangan</span>
                </h1>
                <p class="text-slate-500 dark:text-slate-400 font-light max-w-2xl text-base sm:text-lg mb-6">
                    Bentuk keterbukaan pengelola dalam menjaga amanah kolekte, persembahan, serta alokasi dana pembangunan pelayanan jemaat.
                </p>

                <!-- ================= NEW FEATURE: AYAT ALKITAB UTK TRANSPARANSI KEUANGAN ================= -->
                <div class="relative max-w-2xl bg-slate-50/60 dark:bg-slate-900/40 border border-slate-100 dark:border-slate-800/60 p-4 rounded-2xl flex gap-3 items-start backdrop-blur-sm">
                    <i data-lucide="quote" class="w-5 h-5 text-indigo-500 shrink-0 transform rotate-180 mt-1"></i>
                    <div>
                        <p class="text-xs sm:text-sm italic font-medium text-slate-600 dark:text-slate-300 tracking-wide leading-relaxed">
                            "Muliakanlah TUHAN dengan hartamu dan dengan hasil pertama dari segala penghasilanmu, maka lumbung-lumbungmu akan diisi penuh sampai melimpah-limpah..."
                        </p>
                        <span class="block text-[10px] font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider mt-2">
                            — Amsal 3:9-10a
                        </span>
                    </div>
                </div>
            </div>

            <!-- TOMBOL: MINIMALIS, PROFESIONAL, & ELEGAN -->
            <div class="shrink-0 self-start md:self-center">
                <button @click="openTransferModal = true" 
                        class="w-full md:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-slate-900 hover:bg-indigo-600 dark:bg-slate-800 dark:hover:bg-indigo-600 text-white text-sm font-bold rounded-2xl shadow-sm border border-slate-800 dark:border-slate-700 hover:border-indigo-500 transition-all duration-200 group">
                    <i data-lucide="wallet" class="w-4 h-4 text-indigo-400 group-hover:text-white transition-colors"></i>
                    <span>Salurkan Persembahan</span>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400 group-hover:text-white group-hover:translate-x-0.5 transition-all"></i>
                </button>
            </div>
        </div>

        <!-- 2. KARTU STATISTIK RINGKASAN KAS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pemasukan -->
            <div class="bg-white dark:bg-slate-900 rounded-[2rem] border border-slate-200/60 dark:border-slate-800/80 p-8 shadow-sm relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-emerald-500/5 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Pemasukan</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-emerald-600 dark:text-emerald-400 tracking-tight">
                    Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                </h2>
            </div>

            <!-- Pengeluaran -->
            <div class="bg-white dark:bg-slate-900 rounded-[2rem] border border-slate-200/60 dark:border-slate-800/80 p-8 shadow-sm relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-rose-500/5 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Pengeluaran</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-rose-600 dark:text-rose-400 tracking-tight">
                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                </h2>
            </div>

            <!-- Saldo Kas Aktif -->
            <div class="bg-white dark:bg-slate-900 rounded-[2rem] border border-slate-200/60 dark:border-slate-800/80 p-8 shadow-sm relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-indigo-500/5 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Saldo Kas Saat Ini</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-indigo-600 dark:text-indigo-400 tracking-tight">
                    Rp {{ number_format($saldo, 0, ',', '.') }}
                </h2>
            </div>
        </div>

        <!-- 3. BENTO BOX: DATA RIWAYAT TRANSAKSI -->
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-200/60 dark:border-slate-800/80 shadow-sm overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 dark:border-slate-800/60 flex items-center justify-between">
                <h2 class="text-xl font-bold text-slate-900 dark:text-white">Jurnal Mutasi Kas</h2>
                <span class="text-xs text-slate-400 dark:text-slate-500 font-light">Diperbarui berkala oleh Bendahara</span>
            </div>

            <!-- LAYAR LEBAR: TABLE VIEW -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/70 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800">
                            <th class="px-8 py-4.5 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-8 py-4.5 text-xs font-bold text-slate-500 uppercase tracking-wider">Jenis</th>
                            <th class="px-8 py-4.5 text-xs font-bold text-slate-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-8 py-4.5 text-xs font-bold text-slate-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-8 py-4.5 text-xs font-bold text-slate-500 uppercase tracking-wider">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                        @forelse($keuangan as $item)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/30 transition-colors duration-150">
                                <td class="px-8 py-5 text-sm text-slate-600 dark:text-slate-300 font-medium">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                </td>
                                <td class="px-8 py-5">
                                    @if($item->jenis == 'pemasukan')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-900/20">Pemasukan</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-rose-50 dark:bg-rose-950/30 text-rose-600 dark:text-rose-400 border border-rose-100 dark:border-rose-900/20">Pengeluaran</span>
                                    @endif
                                </td>
                                <td class="px-8 py-5 text-sm text-slate-700 dark:text-slate-300 font-semibold">
                                    {{ $item->kategori }}
                                </td>
                                <td class="px-8 py-5 text-sm font-bold tracking-tight {{ $item->jenis == 'pemasukan' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                    {{ $item->jenis == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="px-8 py-5 text-sm text-slate-400 dark:text-slate-500 font-light max-w-xs truncate" title="{{ $item->keterangan }}">
                                    {{ $item->keterangan ?? '-' }}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- LAYAR HP: LIST CARD VIEW -->
            <div class="block md:hidden divide-y divide-slate-100 dark:divide-slate-800/80">
                @forelse($keuangan as $item)
                    <div class="p-6 flex flex-col gap-3.5 bg-white dark:bg-slate-900">
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-slate-400 font-medium">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                            @if($item->jenis == 'pemasukan')
                                <span class="px-2 py-0.5 rounded text-[10px] font-extrabold bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 uppercase">Masuk</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-[10px] font-extrabold bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 uppercase">Keluar</span>
                            @endif
                        </div>
                        <div class="flex flex-col gap-0.5">
                            <span class="text-xs font-light text-slate-400">Kategori & Deskripsi</span>
                            <h4 class="text-base font-bold text-slate-800 dark:text-slate-200">{{ $item->kategori }}</h4>
                            @if($item->keterangan)
                                <p class="text-xs text-slate-400 dark:text-slate-500 font-light mt-1">{{ $item->keterangan }}</p>
                            @endif
                        </div>
                        <div class="pt-2 flex justify-between items-center border-t border-slate-50 dark:border-slate-800/40">
                            <span class="text-xs text-slate-400 font-light">Nominal</span>
                            <span class="text-base font-black tracking-tight {{ $item->jenis == 'pemasukan' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                {{ $item->jenis == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="p-16 text-center">
                        <div class="w-16 h-16 bg-slate-50 dark:bg-slate-800 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-slate-200 mb-1">Belum Ada Catatan Kas</h3>
                        <p class="text-slate-400 dark:text-slate-500 font-light text-sm max-w-md mx-auto">
                            Jurnal audit transparansi kas gereja periode ini belum ditambahkan oleh dewan keuangan sekretariat.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- 4. GLOBAL PAGINATION -->
        @if($keuangan->hasPages())
            <div class="mt-16 bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-800/80 rounded-2xl p-4 shadow-sm">
                {{ $keuangan->links() }}
            </div>
        @endif

        <!-- ================= MODAL INTERAKTIF: PEMBAGIAN POS PERSEMBAHAN ================= -->
        <div x-show="openTransferModal" 
             class="fixed inset-0 z-50 overflow-y-auto" 
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <!-- Backdrop Blur -->
            <div class="fixed inset-0 bg-slate-950/50 backdrop-blur-sm" @click="openTransferModal = false"></div>

            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-white dark:bg-slate-900 w-full max-w-lg rounded-[2.5rem] border border-slate-100 dark:border-slate-800 p-8 shadow-xl transform"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                    
                    <!-- Tombol Close -->
                    <button @click="openTransferModal = false" class="absolute top-6 right-6 p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>

                    <!-- Judul Modal -->
                    <div class="text-center mb-5">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white tracking-tight">Pemberian Digital</h3>
                        <p class="text-xs text-slate-400 dark:text-slate-500 mt-1">Silakan pilih kategori alokasi pelayanan di bawah ini</p>
                    </div>

                    <!-- TAB SELECTOR (PERSEPULUHAN DAN PEMBANGUNAN) -->
                    <div class="grid grid-cols-2 p-1 bg-slate-100 dark:bg-slate-950/60 rounded-xl mb-5">
                        <button @click="activeTab = 'persepuluhan'"
                                :class="activeTab === 'persepuluhan' ? 'bg-white dark:bg-slate-800 text-indigo-600 dark:text-white shadow-sm' : 'text-slate-500 hover:text-slate-800 dark:hover:text-slate-300'"
                                class="py-2.5 text-xs font-bold rounded-lg transition-all flex items-center justify-center gap-1.5">
                            <i data-lucide="heart" class="w-3.5 h-3.5"></i> Persepuluhan
                        </button>
                        <button @click="activeTab = 'pembangunan'"
                                :class="activeTab === 'pembangunan' ? 'bg-white dark:bg-slate-800 text-indigo-600 dark:text-white shadow-sm' : 'text-slate-500 hover:text-slate-800 dark:hover:text-slate-300'"
                                class="py-2.5 text-xs font-bold rounded-lg transition-all flex items-center justify-center gap-1.5">
                            <i data-lucide="gantt-chart" class="w-3.5 h-3.5"></i> Pembangunan
                        </button>
                    </div>

                    <!-- ================= DYNAMIC BIBLE VERSE SECTION ================= -->
                    <div class="mb-5 p-4 rounded-2xl bg-indigo-50/50 dark:bg-indigo-950/20 border border-indigo-100/40 dark:border-indigo-900/20 relative overflow-hidden">
                        <div class="absolute -right-2 -bottom-2 text-indigo-500/10 dark:text-indigo-400/5">
                            <i data-lucide="quote" class="w-16 h-16 transform rotate-180"></i>
                        </div>
                        
                        <!-- Ayat Khusus Persepuluhan -->
                        <div x-show="activeTab === 'persepuluhan'" x-transition:enter="transition ease-out duration-200">
                            <p class="text-xs font-medium text-slate-600 dark:text-slate-300 italic leading-relaxed">
                                "Bawalah seluruh persembahan persepuluhan itu ke dalam rumah perbendaharaan, supaya ada persediaan makanan di rumah-Ku..."
                            </p>
                            <span class="block text-[10px] font-bold text-indigo-600 dark:text-indigo-400 mt-2 tracking-wide">Maleakhi 3:10a</span>
                        </div>

                        <!-- Ayat Khusus Pembangunan / Umum -->
                        <div x-show="activeTab === 'pembangunan'" x-transition:enter="transition ease-out duration-200" style="display: none;">
                            <p class="text-xs font-medium text-slate-600 dark:text-slate-300 italic leading-relaxed">
                                "Hendaklah masing-masing memberikan menurut kerelaan hatinya, jangan dengan sedih hati atau karena paksaan, sebab Allah mengasihi orang yang memberi dengan sukacita."
                            </p>
                            <span class="block text-[10px] font-bold text-indigo-600 dark:text-indigo-400 mt-2 tracking-wide">2 Korintus 9:7</span>
                        </div>
                    </div>

                    <!-- PANEL KONTEN TAB -->
                    <div class="space-y-6">
                        <!-- DETAIL POS 1: PERSEPULUHAN -->
                        <div x-show="activeTab === 'persepuluhan'" class="space-y-5" x-transition>
                            <div class="bg-slate-50 dark:bg-slate-950/40 rounded-2xl p-5 border border-slate-100 dark:border-slate-850/60 flex flex-col items-center text-center">
                                <div class="bg-white p-2.5 rounded-xl border border-slate-200/60 inline-block mb-2">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=QRIS-Persepuluhan-Gereja" alt="QRIS Persepuluhan" class="w-36 h-36 rounded-md">
                                </div>
                                <span class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">QRIS Persepuluhan Jemaat</span>
                            </div>

                            <div class="bg-slate-50 dark:bg-slate-950/40 rounded-2xl p-5 border border-slate-100 dark:border-slate-850/60 flex items-center justify-between gap-4">
                                <div class="min-w-0 flex-1">
                                    <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400 dark:text-slate-500">Rekening BCA Persepuluhan</p>
                                    <p class="text-lg font-mono font-bold text-slate-800 dark:text-slate-100 tracking-wider mt-0.5" id="rek-persepuluhan">8720-1111-55</p>
                                    <p class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 truncate">a.n MAJELIS GEREJA - POS PERSEPULUHAN</p>
                                </div>
                                <button onclick="copyText('rek-persepuluhan')" class="p-3 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white border border-slate-200 dark:border-slate-700 rounded-xl shadow-sm active:scale-95 transition-all shrink-0">
                                    <i data-lucide="copy" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>

                        <!-- DETAIL POS 2: PEMBANGUNAN -->
                        <div x-show="activeTab === 'pembangunan'" class="space-y-5" x-transition style="display: none;">
                            <div class="bg-slate-50 dark:bg-slate-950/40 rounded-2xl p-5 border border-slate-100 dark:border-slate-850/60 flex flex-col items-center text-center">
                                <div class="bg-white p-2.5 rounded-xl border border-slate-200/60 inline-block mb-2">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=QRIS-Pembangunan-Gereja" alt="QRIS Pembangunan" class="w-36 h-36 rounded-md">
                                </div>
                                <span class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">QRIS Alokasi Dana Pembangunan</span>
                            </div>

                            <div class="bg-slate-50 dark:bg-slate-950/40 rounded-2xl p-5 border border-slate-100 dark:border-slate-850/60 flex items-center justify-between gap-4">
                                <div class="min-w-0 flex-1">
                                    <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400 dark:text-slate-500">Rekening Bank Mandiri Pembangunan</p>
                                    <p class="text-lg font-mono font-bold text-slate-800 dark:text-slate-100 tracking-wider mt-0.5" id="rek-pembangunan">152-00-9988-111</p>
                                    <p class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 truncate">a.n PANITIA PEMBANGUNAN GEDUNG GEREJA</p>
                                </div>
                                <button onclick="copyText('rek-pembangunan')" class="p-3 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-white border border-slate-200 dark:border-slate-700 rounded-xl shadow-sm active:scale-95 transition-all shrink-0">
                                    <i data-lucide="copy" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/60 text-center">
                        <p class="text-[11px] text-slate-400 dark:text-slate-500 italic leading-relaxed">
                            Mendukung penginjilan, pemeliharaan gedung gereja, dan operasional pelayanan jemaat umum.
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- SCRIPT COPY NO REKENING UNIVERSAL -->
    <script>
        function copyText(elementId) {
            const textToCopy = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(textToCopy);
            alert('Nomor rekening berhasil disalin!');
        }

        // Inisialisasi ikon Lucide
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</x-app-layout>