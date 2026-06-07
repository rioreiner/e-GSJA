<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Masuk') — SIM Gereja</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 50:'#eef2ff',100:'#e0e7ff',200:'#c7d2fe',300:'#a5b4fc',400:'#818cf8',500:'#6366f1',600:'#4f46e5',700:'#4338ca',800:'#3730a3',900:'#312e81' },
                        slate: { 50:'#f8fafc',100:'#f1f5f9',200:'#e2e8f0',300:'#cbd5e1',400:'#94a3b8',500:'#64748b',600:'#475569',700:'#334155',800:'#1e293b',900:'#0f172a' }
                    },
                    fontFamily: { sans: ['Inter','ui-sans-serif','system-ui'] },
                    animation: { 'fade-up':'fadeUp .45s ease both', 'spin-slow':'spin 3s linear infinite' },
                    keyframes: { fadeUp:{'0%':{ opacity:'0', transform:'translateY(16px)' },'100%':{ opacity:'1', transform:'translateY(0)' }} }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.85); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
        .mesh-bg {
            background-color: #312e81;
            background-image:
                radial-gradient(at 20% 30%, rgba(99,102,241,0.6) 0px, transparent 50%),
                radial-gradient(at 80% 10%, rgba(167,139,250,0.4) 0px, transparent 50%),
                radial-gradient(at 60% 80%, rgba(16,185,129,0.25) 0px, transparent 50%),
                radial-gradient(at 10% 90%, rgba(79,70,229,0.5) 0px, transparent 50%);
        }
        .input-field {
            @apply w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/70 text-slate-800 text-sm
                   placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent
                   transition duration-200;
        }
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="h-full mesh-bg flex items-center justify-center p-4 min-h-screen">

    {{-- Decorative orbs --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-violet-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 w-full max-w-md animate-fade-up">

        {{-- Brand Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 backdrop-blur rounded-2xl mb-4 ring-1 ring-white/20">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">SIM Gereja</h1>
            <p class="text-indigo-200 text-sm mt-1">Sistem Informasi Manajemen Gereja</p>
        </div>

        {{-- Glass Card --}}
        <div class="glass rounded-3xl shadow-2xl shadow-indigo-900/30 ring-1 ring-white/30 p-8">
            @yield('content')
        </div>

        {{-- Footer --}}
        <p class="text-center text-indigo-300/60 text-xs mt-6">
            &copy; {{ date('Y') }} SIM Gereja. Semua hak dilindungi.
        </p>
    </div>

    @stack('scripts')
</body>
</html>