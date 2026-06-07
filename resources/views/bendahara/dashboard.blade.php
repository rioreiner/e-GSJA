@extends('layouts.admin')

@section('title', 'Dashboard Bendahara')
@section('page-title', 'Dashboard Bendahara')
@section('breadcrumb', 'Bendahara')

@section('content')

{{-- ===================== WELCOME BANNER ===================== --}}
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-800 via-emerald-700 to-teal-600 p-6 mb-6 shadow-xl">

    <div class="absolute -top-16 -right-16 w-64 h-64 bg-white/5 rounded-full"></div>
    <div class="absolute bottom-0 right-20 w-32 h-32 bg-white/5 rounded-full"></div>

    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>

                <span class="text-xs uppercase tracking-widest font-semibold text-emerald-100">
                    Bendahara Panel
                </span>
            </div>

            <h2 class="text-2xl font-black text-white mb-1">
                Selamat datang,
                {{ \Illuminate\Support\Str::words(auth()->user()->name, 1, '') }} 👋
            </h2>

            <p class="text-emerald-100 text-sm">
                {{ now()->translatedFormat('l, d F Y') }}
                • Kelola seluruh transaksi dan laporan keuangan gereja.
            </p>
        </div>

        <div class="flex flex-wrap gap-3">

            <a href="{{ route('admin.keuangan.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white text-emerald-700 hover:bg-emerald-50 transition font-semibold shadow-lg">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>

                Catat Transaksi
            </a>

            <a href="{{ route('admin.keuangan.laporan') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-white ring-1 ring-white/30 transition font-semibold">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>

                Laporan
            </a>

        </div>
    </div>
</div>

{{-- ===================== STATISTICS ===================== --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    {{-- Total Pemasukan --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold">
                    Total Pemasukan
                </p>

                <h3 class="mt-2 text-2xl font-black text-emerald-600">
                    Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}
                </h3>

                <p class="text-xs text-slate-400 mt-1">
                    Semua waktu
                </p>
            </div>

            <div class="w-12 h-12 rounded-2xl bg-emerald-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Total Pengeluaran --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold">
                    Total Pengeluaran
                </p>

                <h3 class="mt-2 text-2xl font-black text-rose-600">
                    Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}
                </h3>

                <p class="text-xs text-slate-400 mt-1">
                    Semua waktu
                </p>
            </div>

            <div class="w-12 h-12 rounded-2xl bg-rose-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-rose-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Pemasukan Bulan Ini --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold">
                    Pemasukan Bulan Ini
                </p>

                <h3 class="mt-2 text-2xl font-black text-blue-600">
                    Rp {{ number_format($bulanIniPemasukan ?? 0, 0, ',', '.') }}
                </h3>

                <p class="text-xs text-slate-400 mt-1">
                    {{ now()->translatedFormat('F Y') }}
                </p>
            </div>

            <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Pengeluaran Bulan Ini --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold">
                    Pengeluaran Bulan Ini
                </p>

                <h3 class="mt-2 text-2xl font-black text-amber-600">
                    Rp {{ number_format($bulanIniPengeluaran ?? 0, 0, ',', '.') }}
                </h3>

                <p class="text-xs text-slate-400 mt-1">
                    {{ now()->translatedFormat('F Y') }}
                </p>
            </div>

            <div class="w-12 h-12 rounded-2xl bg-amber-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                </svg>
            </div>
        </div>
    </div>

</div>

{{-- ===================== SALDO ===================== --}}
<div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 mb-6 shadow-sm">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <p class="text-xs uppercase tracking-wider font-bold text-slate-500">
                Saldo Kas Gereja
            </p>

            <h2 class="text-4xl font-black mt-2 {{ ($saldo ?? 0) >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                Rp {{ number_format($saldo ?? 0, 0, ',', '.') }}
            </h2>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('admin.keuangan.export-pdf') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-semibold transition">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 10v6m0 0l-3-3m3 3l3-3"/>
                </svg>

                Export PDF
            </a>

        </div>
    </div>
</div>

{{-- ===================== CHART & TRANSAKSI ===================== --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

    {{-- CHART --}}
    <div class="xl:col-span-2 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-5 shadow-sm">

        <div class="flex items-center justify-between mb-5">

            <div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                    Grafik Keuangan 6 Bulan
                </h3>

                <p class="text-sm text-slate-400">
                    Statistik pemasukan dan pengeluaran
                </p>
            </div>

        </div>

        <div class="h-72">
            <canvas id="keuanganChart"></canvas>
        </div>

    </div>

    {{-- TRANSAKSI --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">

            <h3 class="font-bold text-slate-900 dark:text-white">
                Transaksi Terbaru
            </h3>

            <a href="{{ route('admin.keuangan.index') }}"
               class="text-sm font-semibold text-emerald-600 hover:underline">

                Lihat Semua →
            </a>

        </div>

        <div class="divide-y divide-slate-100 dark:divide-slate-800">

            @forelse($recentKeuangan as $trx)

                <div class="flex items-center gap-3 px-5 py-4 hover:bg-slate-50 dark:hover:bg-slate-800/40 transition">

                    <div class="w-10 h-10 rounded-xl flex items-center justify-center
                        {{ $trx->jenis == 'pemasukan' ? 'bg-emerald-100' : 'bg-rose-100' }}">

                        <svg class="w-5 h-5
                            {{ $trx->jenis == 'pemasukan' ? 'text-emerald-600' : 'text-rose-600' }}"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="{{ $trx->jenis == 'pemasukan'
                                      ? 'M7 11l5-5m0 0l5 5m-5-5v12'
                                      : 'M17 13l-5 5m0 0l-5-5m5 5V6' }}"/>
                        </svg>
                    </div>

                    <div class="flex-1 min-w-0">

                        <p class="font-semibold text-sm text-slate-800 dark:text-slate-200 truncate">
                            {{ $trx->kategori }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ $trx->tanggal->translatedFormat('d F Y') }}
                        </p>

                    </div>

                    <div class="text-sm font-bold
                        {{ $trx->jenis == 'pemasukan' ? 'text-emerald-600' : 'text-rose-600' }}">

                        {{ $trx->jenis == 'pemasukan' ? '+' : '-' }}
                        Rp {{ number_format($trx->jumlah, 0, ',', '.') }}

                    </div>

                </div>

            @empty

                <div class="p-8 text-center text-slate-400 text-sm">
                    Belum ada transaksi terbaru.
                </div>

            @endforelse

        </div>

        <div class="p-4 border-t border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/20">

            <a href="{{ route('admin.keuangan.create') }}"
               class="flex items-center justify-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>

                Tambah Transaksi Baru
            </a>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('keuanganChart');

    if (!ctx) return;

    new Chart(ctx, {
        type: 'line',

        data: {
            labels: @json($chartData['labels']),

            datasets: [
                {
                    label: 'Pemasukan',
                    data: @json($chartData['pemasukan']),
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16,185,129,0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                },
                {
                    label: 'Pengeluaran',
                    data: @json($chartData['pengeluaran']),
                    borderColor: '#f43f5e',
                    backgroundColor: 'rgba(244,63,94,0.08)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                }
            ]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    position: 'top'
                },

                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.raw.toLocaleString('id-ID');
                        }
                    }
                }
            },

            scales: {
                y: {
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

});
</script>

@endpush