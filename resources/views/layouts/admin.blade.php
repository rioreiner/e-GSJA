<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — GSJA EL-Zimrah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>tailwind.config={theme:{extend:{colors:{brand:{50:'#eef2ff',100:'#e0e7ff',200:'#c7d2fe',300:'#a5b4fc',400:'#818cf8',500:'#6366f1',600:'#4f46e5',700:'#4338ca',800:'#3730a3',900:'#312e81',950:'#1e1b4b'}}}}}</script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{box-sizing:border-box}
        html,body{height:100%}
        body{font-family:'Inter',sans-serif;background:#f1f5f9}
        [x-cloak]{display:none!important}
        ::-webkit-scrollbar{width:4px;height:4px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:#c7d2fe;border-radius:99px}
        .nav-link{display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:10px;font-size:13.5px;font-weight:500;color:rgba(199,210,254,0.8);transition:all 0.15s ease;text-decoration:none;white-space:nowrap}
        .nav-link:hover{background:rgba(255,255,255,0.1);color:#fff}
        .nav-link.active{background:#fff;color:#4338ca;box-shadow:0 2px 12px rgba(67,56,202,0.2)}
        .nav-link.active svg{color:#4338ca!important}
        .nav-link svg{flex-shrink:0;width:16px;height:16px;color:rgba(165,180,252,0.7)}
        .nav-section{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:rgba(165,180,252,0.45);padding:0 12px;margin:16px 0 4px;display:block}
        .th{padding:10px 16px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:#64748b;background:#f8fafc;white-space:nowrap}
        .td{padding:13px 16px;font-size:13.5px;color:#1e293b;vertical-align:middle}
        .form-label{display:block;font-size:12px;font-weight:600;color:#374151;margin-bottom:6px}
        .form-control{width:100%;padding:10px 14px;font-size:13.5px;border-radius:10px;border:1.5px solid #e2e8f0;background:#fff;color:#1e293b;outline:none;transition:border-color .2s,box-shadow .2s;font-family:'Inter',sans-serif}
        .form-control:focus{border-color:#6366f1;box-shadow:0 0 0 3px rgba(99,102,241,.12)}
        .form-control::placeholder{color:#94a3b8}
        .form-control.is-invalid{border-color:#f43f5e}
        .form-select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;background-size:16px;padding-right:40px}
        .badge{display:inline-flex;align-items:center;gap:5px;padding:3px 10px;border-radius:99px;font-size:11.5px;font-weight:600}
        .badge-emerald{background:#d1fae5;color:#065f46}
        .badge-rose{background:#ffe4e6;color:#9f1239}
        .badge-amber{background:#fef3c7;color:#92400e}
        .badge-blue{background:#dbeafe;color:#1e40af}
        .badge-slate{background:#f1f5f9;color:#475569}
        .badge-violet{background:#ede9fe;color:#5b21b6}
        .badge-indigo{background:#e0e7ff;color:#3730a3}
        .badge-cyan{background:#cffafe;color:#164e63}
        .badge-orange{background:#ffedd5;color:#9a3412}
        .badge-pink{background:#fce7f3;color:#9d174d}
        .card{background:#fff;border-radius:16px;box-shadow:0 1px 3px rgba(0,0,0,.05),0 0 0 1px rgba(0,0,0,.04)}
        .stat-card{transition:transform .2s,box-shadow .2s}
        .stat-card:hover{transform:translateY(-2px);box-shadow:0 10px 30px rgba(0,0,0,.08)}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;padding:9px 16px;border-radius:10px;font-size:13px;font-weight:600;transition:all .15s;cursor:pointer;text-decoration:none;border:none;font-family:'Inter',sans-serif}
        .btn-primary{background:#4f46e5;color:#fff;box-shadow:0 1px 3px rgba(79,70,229,.3)}
        .btn-primary:hover{background:#4338ca}
        .btn-secondary{background:#fff;color:#374151;box-shadow:0 1px 3px rgba(0,0,0,.08);border:1.5px solid #e2e8f0}
        .btn-secondary:hover{background:#f8fafc;border-color:#c7d2fe}
        .btn-danger{background:#f43f5e;color:#fff}
        .btn-danger:hover{background:#e11d48}
        .btn-success{background:#10b981;color:#fff}
        .btn-success:hover{background:#059669}
        .btn-sm{padding:6px 12px;font-size:12px;border-radius:8px}
        .btn-xs{padding:4px 10px;font-size:11.5px;border-radius:6px}
        @keyframes shimmer{from{background-position:-400px 0}to{background-position:400px 0}}
        .skeleton{background:linear-gradient(90deg,#e2e8f0 25%,#f8fafc 50%,#e2e8f0 75%);background-size:800px 100%;animation:shimmer 1.5s ease-in-out infinite;border-radius:8px}
    </style>
    @stack('styles')
</head>
<body x-data="sidebarApp()" class="h-full flex overflow-hidden">

{{-- SIDEBAR --}}
<aside :class="open ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 w-64 flex flex-col flex-shrink-0
              bg-gradient-to-b from-brand-950 via-brand-900 to-brand-800
              transition-transform duration-300 ease-out
              lg:relative lg:translate-x-0 lg:inset-auto lg:z-auto">
    {{-- Brand --}}
    <div class="flex items-center gap-3 px-4 py-4 border-b border-white/10 flex-shrink-0">
        <div class="w-9 h-9 rounded-xl bg-white/10 ring-1 ring-white/20 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-brand-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2l1.8 5.6H20l-4.7 3.4 1.8 5.6L12 13.2l-5.1 3.4 1.8-5.6L4 7.6h6.2L12 2z"/>
            </svg>
        </div>
        <div class="min-w-0 flex-1">
            <p class="text-white font-bold text-sm">SIM Gereja</p>
            <p class="text-brand-300 text-xs truncate">Manajemen Jemaat</p>
        </div>
        <button @click="open=false" class="text-brand-400 hover:text-white lg:hidden flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto px-3 py-3 space-y-0.5">
        @php $role = auth()->user()->getRoleNames()->first() ?? 'jemaat'; @endphp
        @if($role === 'admin')
            <span class="nav-section">Utama</span>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Dashboard</a>
            <a href="{{ route('admin.jemaat.index') }}" class="nav-link {{ request()->routeIs('admin.jemaat.*') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Data Jemaat</a>
            
            <span class="nav-section">Ibadah</span>
            <a href="{{ route('admin.jadwal.index') }}" class="nav-link {{ request()->routeIs('admin.jadwal.*') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>Jadwal Ibadah</a>
            <a href="{{ route('admin.pelayanan.index') }}" class="nav-link {{ request()->routeIs('admin.pelayanan.*') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>Tim Pelayanan</a>
            
            <span class="nav-section">Keuangan</span>
            <a href="{{ route('admin.keuangan.index') }}" class="nav-link {{ request()->routeIs('admin.keuangan.index') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Keuangan</a>
            <a href="{{ route('admin.keuangan.laporan') }}" class="nav-link {{ request()->routeIs('admin.keuangan.laporan') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>Laporan Bulanan</a>
            
            <span class="nav-section">Konten</span>
            <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v8a2 2 0 01-2 2zM9 9h2M9 13h6M9 17h6"/></svg>Berita</a>
            <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>Event</a>
            
            <!-- MENU BARU: SOROTAN GALERI -->
            <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Sorotan Galeri
            </a>
       
        @else
            <span class="nav-section">Portal Jemaat</span>
            <a href="{{ route('jemaat.dashboard') }}" class="nav-link {{ request()->routeIs('jemaat.dashboard') ? 'active' : '' }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Beranda</a>
        @endif
        <div class="my-3 border-t border-white/10"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link w-full text-left text-rose-300 hover:bg-rose-500/20 hover:text-white">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Keluar
            </button>
        </form>
    </nav>
    <div class="px-3 py-3 border-t border-white/10 flex-shrink-0">
        <div class="flex items-center gap-2.5 p-2.5 rounded-xl hover:bg-white/5 transition-colors">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-brand-400 to-violet-500 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-white text-xs font-semibold truncate">{{ auth()->user()->name }}</p>
                <p class="text-brand-300 text-xs truncate capitalize">{{ auth()->user()->getRoleNames()->first() ?? 'User' }}</p>
            </div>
            <div class="w-2 h-2 rounded-full bg-emerald-400 flex-shrink-0"></div>
        </div>
    </div>
</aside>

{{-- Mobile overlay --}}
<div x-show="open" @click="open=false" x-cloak class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm lg:hidden"
     x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
     x-transition:leave="transition duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

{{-- MAIN --}}
<div class="flex-1 flex flex-col min-w-0 overflow-hidden">
    {{-- Topbar --}}
    <header class="sticky top-0 z-30 bg-white/90 backdrop-blur-md border-b border-slate-200/70 flex-shrink-0 h-14 flex items-center px-5 gap-4">
        <button @click="open=!open" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <div class="flex-1 min-w-0">
            <h1 class="text-sm font-bold text-slate-800 truncate">@yield('page-title','Dashboard')</h1>
            <div class="hidden sm:flex items-center gap-1 text-xs text-slate-400 mt-0.5">
                <span>GSJA</span>
                @hasSection('breadcrumb')<span>›</span>@yield('breadcrumb')@endif
            </div>
        </div>
        <div class="flex items-center gap-2 flex-shrink-0">
            <span class="hidden md:block text-xs text-slate-400 bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-100">{{ now()->translatedFormat('d F Y') }}</span>
            <div x-data="{dd:false}" class="relative">
                <button @click="dd=!dd" class="flex items-center gap-2 pl-2 pr-3 py-1.5 rounded-xl hover:bg-slate-100 transition-colors">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-brand-500 to-violet-600 flex items-center justify-center text-white font-bold text-xs">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
                    <span class="hidden sm:block text-xs font-semibold text-slate-700">{{ Str::limit(auth()->user()->name,16) }}</span>
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="dd" @click.outside="dd=false" x-cloak
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                     class="absolute right-0 top-full mt-2 w-52 bg-white rounded-2xl shadow-xl ring-1 ring-slate-200 py-1.5 z-50 origin-top-right">
                    <div class="px-4 py-2.5 border-b border-slate-100">
                        <p class="text-xs font-bold text-slate-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="border-t border-slate-100 pt-1 mt-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-2.5 w-full px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="flex-1 overflow-y-auto">
        <div class="p-5 lg:p-7 max-w-screen-2xl mx-auto">
            @foreach(['success'=>'emerald','error'=>'rose','warning'=>'amber'] as $type=>$clr)
                @if(session($type))
                    <div x-data="{v:true}" x-show="v" x-init="setTimeout(()=>v=false,4500)"
                         x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                         class="mb-5 flex items-center gap-3 px-4 py-3 rounded-xl border bg-{{ $clr }}-50 border-{{ $clr }}-200 text-{{ $clr }}-800">
                        <p class="text-sm font-medium flex-1">{{ session($type) }}</p>
                        <button @click="v=false" class="text-{{ $clr }}-400 hover:text-{{ $clr }}-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                @endif
            @endforeach
            @yield('content')
        </div>
    </main>
</div>
<script>
function sidebarApp(){
    return {
        open: window.innerWidth>=1024,
        init(){ window.addEventListener('resize',()=>{ if(window.innerWidth>=1024) this.open=true; }); }
    }
}
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Handler untuk Alert Flash Session (Success)
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: {
                        popup: 'rounded-3xl',
                    }
                });
            @endif

            // 2. Handler untuk Alert Flash Session (Error/Gagal)
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#ef4444',
                    customClass: {
                        popup: 'rounded-3xl',
                        confirmButton: 'rounded-xl px-5 py-2.5 font-semibold text-sm'
                    }
                });
            @endif

            // 3. Handler Global untuk Konfirmasi Hapus Data
            // Mencari semua form yang memiliki atribut data-confirm
            document.body.addEventListener('submit', function (e) {
                const form = e.target;
                
                // Cek apakah form memiliki class 'delete-form' atau deteksi internal confirm
                if (form.classList.contains('js-delete-confirm') || form.getAttribute('onsubmit')) {
                    // Jika form menggunakan SweetAlert, matikan onsubmit bawaan HTML browser
                    if (form.getAttribute('data-swal-validated') === 'true') {
                        return; // Biarkan form submit jika sudah divalidasi SweetAlert
                    }

                    e.preventDefault(); // Stop form submit otomatis

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#f59e0b', // Warna Amber sesuai tema
                        cancelButtonColor: '#cbd5e1',  // Warna Slate
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        customClass: {
                            popup: 'rounded-3xl',
                            confirmButton: 'rounded-2xl px-5 py-3 font-bold text-sm',
                            cancelButton: 'rounded-2xl px-5 py-3 font-semibold text-sm'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Tandai form bahwa SweetAlert telah menyetujui, lalu submit
                            form.setAttribute('data-swal-validated', 'true');
                            form.submit();
                        }
                    });
                }
            });
        });
    </script>
</script>
@stack('scripts')
</body>
</html>