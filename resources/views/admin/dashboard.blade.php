@extends('layouts.admin')
@section('title','Dashboard Admin')
@section('page-title','Dashboard')
@section('breadcrumb','Admin')
@section('content')

{{-- Welcome --}}
<div class="relative bg-gradient-to-br from-brand-800 via-brand-700 to-indigo-700 rounded-2xl p-6 mb-6 overflow-hidden">
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full"></div>
    <div class="absolute bottom-0 right-20 w-28 h-28 bg-white/5 rounded-full"></div>
    <div class="relative flex flex-col sm:flex-row sm:items-center gap-4">
        <div class="flex-1">
            <div class="flex items-center gap-2 mb-1.5">
                <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>
                <span class="text-brand-200 text-xs font-semibold uppercase tracking-wider">Admin Panel</span>
            </div>
            <h2 class="text-xl font-extrabold text-white">Selamat datang, {{ Str::words(auth()->user()->name,1,'') }}! 👋</h2>
            <p class="text-brand-200 text-sm mt-1">{{ now()->translatedFormat('l, d F Y') }} · Kelola data gereja Anda.</p>
        </div>
        <div class="flex gap-2 flex-shrink-0">
            <a href="{{ route('admin.jemaat.create') }}" class="btn btn-sm bg-white text-brand-700 hover:bg-brand-50 shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Jemaat
            </a>
            <a href="{{ route('admin.keuangan.create') }}" class="btn btn-sm bg-white/15 hover:bg-white/25 text-white ring-1 ring-white/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Catat Keuangan
            </a>
        </div>
    </div>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 xl:grid-cols-5 gap-4 mb-6">
    @foreach([
        ['Total Jemaat',     $totalJemaat,     'indigo',   'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', false, route('admin.jemaat.index')],
        ['Total Event',      $totalEvent,      'violet',   'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',false, route('admin.events.index')],
        ['Total Berita',     $totalBerita,     'cyan',     'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v8a2 2 0 01-2 2zM9 9h2M9 13h6M9 17h6', false, route('admin.posts.index')],
        ['Total Pemasukan',  $totalPemasukan,  'emerald',  'M7 11l5-5m0 0l5 5m-5-5v12', true, route('admin.keuangan.index')],
        ['Total Pengeluaran',$totalPengeluaran,'rose',     'M17 13l-5 5m0 0l-5-5m5 5V6', true, route('admin.keuangan.index')],
    ] as [$lbl, $val, $clr, $path, $isCurrency, $href])
    <a href="{{ $href }}" class="card stat-card p-5 block hover:ring-2 hover:ring-{{ $clr }}-200 transition-all">
        <div class="flex items-start justify-between">
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">{{ $lbl }}</p>
                <p class="mt-2 text-xl font-extrabold text-slate-900 truncate">
                    @if($isCurrency) <span class="text-sm font-semibold text-slate-400">Rp </span>@endif
                    {{ $isCurrency ? number_format($val,0,',','.') : number_format($val) }}
                </p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-{{ $clr }}-100 flex items-center justify-center flex-shrink-0 ml-3">
                <svg class="w-5 h-5 text-{{ $clr }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/></svg>
            </div>
        </div>
    </a>
    @endforeach
</div>

{{-- Saldo --}}
<div class="bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 rounded-2xl px-5 py-4 mb-6 flex flex-col sm:flex-row sm:items-center gap-3">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-emerald-500 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-emerald-700 uppercase tracking-wide">Saldo Kas Gereja</p>
            <p class="text-2xl font-extrabold text-emerald-800">Rp {{ number_format($saldo, 0, ',', '.') }}</p>
        </div>
    </div>
    <a href="{{ route('admin.keuangan.laporan') }}" class="sm:ml-auto text-xs font-semibold text-emerald-700 hover:underline">Lihat Laporan →</a>
</div>

{{-- Chart + Quick Actions --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-5">
    <div class="xl:col-span-2 card p-5">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-sm font-bold text-slate-900">Grafik Keuangan</h3>
                <p class="text-xs text-slate-400 mt-0.5">6 bulan terakhir</p>
            </div>
            <div class="flex items-center gap-4 text-xs">
                <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-full bg-indigo-500"></div><span class="text-slate-500">Pemasukan</span></div>
                <div class="flex items-center gap-1.5"><div class="w-3 h-3 rounded-full bg-rose-400"></div><span class="text-slate-500">Pengeluaran</span></div>
            </div>
        </div>
        <div class="h-52"><canvas id="kChart"></canvas></div>
    </div>
    <div class="card p-5">
        <h3 class="text-sm font-bold text-slate-900 mb-3">Aksi Cepat</h3>
        <div class="space-y-1.5">
            @foreach([
                ['Tambah Jemaat',   route('admin.jemaat.create'),   'indigo', 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'],
                ['Jadwal Ibadah',   route('admin.jadwal.create'),   'blue',   'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['Catat Keuangan',  route('admin.keuangan.create'), 'emerald','M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['Tulis Berita',    route('admin.posts.create'),    'cyan',   'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
                ['Buat Event',      route('admin.events.create'),   'violet', 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                ['Laporan',         route('admin.keuangan.laporan'),'amber',  'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ] as [$lbl,$url,$c,$path])
            <a href="{{ $url }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 transition-colors group">
                <div class="w-8 h-8 rounded-xl bg-{{ $c }}-100 flex items-center justify-center group-hover:bg-{{ $c }}-200 transition-colors flex-shrink-0">
                    <svg class="w-4 h-4 text-{{ $c }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/></svg>
                </div>
                <span class="text-sm font-medium text-slate-700 group-hover:text-brand-700 flex-1">{{ $lbl }}</span>
                <svg class="w-4 h-4 text-slate-300 group-hover:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            @endforeach
        </div>
    </div>
</div>

{{-- Bottom Tables --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    {{-- Recent Jemaat --}}
    <div class="card overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <h3 class="text-sm font-bold text-slate-900">Jemaat Terbaru</h3>
            <a href="{{ route('admin.jemaat.index') }}" class="text-xs font-semibold text-brand-600 hover:underline">Lihat semua →</a>
        </div>
        @forelse($recentJemaat as $j)
        <a href="{{ route('admin.jemaat.show',$j) }}" class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-brand-400 to-violet-500 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr($j->nama_lengkap,0,1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-slate-800 truncate">{{ $j->nama_lengkap }}</p>
                <p class="text-xs text-slate-400">{{ $j->nomor_anggota }}</p>
            </div>
            <span class="badge {{ $j->status_keanggotaan==='Aktif' ? 'badge-emerald' : 'badge-slate' }}">{{ $j->status_keanggotaan }}</span>
        </a>
        @empty
        <div class="px-5 py-8 text-center text-sm text-slate-400">Belum ada data jemaat</div>
        @endforelse
    </div>

    {{-- Upcoming Events --}}
    <div class="card overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <h3 class="text-sm font-bold text-slate-900">Event Mendatang</h3>
            <a href="{{ route('admin.events.index') }}" class="text-xs font-semibold text-brand-600 hover:underline">Lihat semua →</a>
        </div>
        @forelse($upcomingEvents as $ev)
        <a href="{{ route('admin.events.show',$ev) }}" class="flex items-start gap-3 px-5 py-3 hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0">
            <div class="w-10 h-10 rounded-xl bg-violet-100 flex flex-col items-center justify-center flex-shrink-0">
                <span class="text-xs font-black text-violet-700 leading-none">{{ $ev->tanggal->format('d') }}</span>
                <span class="text-[10px] font-bold text-violet-500 uppercase">{{ $ev->tanggal->format('M') }}</span>
            </div>
            <div class="flex-1 min-w-0 py-0.5">
                <p class="text-sm font-semibold text-slate-800 truncate">{{ $ev->nama_event }}</p>
                <p class="text-xs text-slate-400 truncate">{{ $ev->lokasi }}</p>
            </div>
        </a>
        @empty
        <div class="px-5 py-8 text-center text-sm text-slate-400">Tidak ada event mendatang</div>
        @endforelse
    </div>

    {{-- Recent Keuangan --}}
    <div class="card overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <h3 class="text-sm font-bold text-slate-900">Transaksi Terbaru</h3>
            <a href="{{ route('admin.keuangan.index') }}" class="text-xs font-semibold text-brand-600 hover:underline">Lihat semua →</a>
        </div>
        @forelse($recentKeuangan as $trx)
        <div class="flex items-center gap-3 px-5 py-3 border-b border-slate-50 last:border-0">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 {{ $trx->jenis==='pemasukan' ? 'bg-emerald-100' : 'bg-rose-100' }}">
                <svg class="w-4 h-4 {{ $trx->jenis==='pemasukan' ? 'text-emerald-600' : 'text-rose-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $trx->jenis==='pemasukan' ? 'M7 11l5-5m0 0l5 5m-5-5v12' : 'M17 13l-5 5m0 0l-5-5m5 5V6' }}"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-800 truncate">{{ $trx->kategori }}</p>
                <p class="text-xs text-slate-400">{{ $trx->tanggal->format('d M Y') }}</p>
            </div>
            <p class="text-xs font-bold {{ $trx->jenis==='pemasukan' ? 'text-emerald-600' : 'text-rose-600' }} flex-shrink-0">
                {{ $trx->jenis==='pemasukan' ? '+' : '-' }}Rp {{ number_format($trx->jumlah,0,',','.') }}
            </p>
        </div>
        @empty
        <div class="px-5 py-8 text-center text-sm text-slate-400">Belum ada transaksi</div>
        @endforelse
    </div>
</div>

@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded',function(){
    const ctx = document.getElementById('kChart');
    if(!ctx) return;
    new Chart(ctx,{
        type:'bar',
        data:{
            labels: @json($chartData['labels']),
            datasets:[
                {label:'Pemasukan',data:@json($chartData['pemasukan']),backgroundColor:'rgba(99,102,241,0.85)',borderRadius:8,borderSkipped:false},
                {label:'Pengeluaran',data:@json($chartData['pengeluaran']),backgroundColor:'rgba(251,113,133,0.85)',borderRadius:8,borderSkipped:false}
            ]
        },
        options:{
            responsive:true,maintainAspectRatio:false,
            plugins:{legend:{display:false},tooltip:{backgroundColor:'#1e293b',padding:12,cornerRadius:12,callbacks:{label:c=>'Rp '+c.raw.toLocaleString('id-ID')}}},
            scales:{
                x:{grid:{display:false},ticks:{font:{size:11},color:'#94a3b8'}},
                y:{grid:{color:'#f1f5f9',borderDash:[4,4]},ticks:{font:{size:11},color:'#94a3b8',callback:v=>'Rp '+(v/1000000).toFixed(1)+'jt'}}
            }
        }
    });
});
</script>
@endpush
