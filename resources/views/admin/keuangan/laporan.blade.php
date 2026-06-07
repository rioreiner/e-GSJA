@extends('layouts.admin')

@section('title','Laporan Keuangan Bulanan')
@section('page-title','Laporan Bulanan')
@section('breadcrumb','Laporan Keuangan')

@section('content')

{{-- HEADER --}}
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">

    <div>
        <h2 class="text-2xl font-bold text-slate-900">
            Laporan Keuangan Bulanan
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Ringkasan pemasukan, pengeluaran, dan saldo gereja
        </p>
    </div>

    {{-- EXPORT PDF --}}
    <a href="{{ route('admin.keuangan.export-pdf') }}"
       class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl
              bg-rose-600 hover:bg-rose-700
              text-white text-sm font-semibold transition
              shadow-lg shadow-rose-600/20">

        <svg class="w-5 h-5"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 10v6m0 0l-3-3m3 3l3-3M4 4h16v16H4z"/>

        </svg>

        Export PDF

    </a>

</div>

{{-- STATISTIC CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    {{-- PEMASUKAN --}}
    <div class="bg-white border rounded-2xl p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Pemasukan
                </p>

                <h3 class="text-3xl font-bold text-emerald-600 mt-2">
                    Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}
                </h3>

            </div>

            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">

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

    {{-- PENGELUARAN --}}
    <div class="bg-white border rounded-2xl p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Pengeluaran
                </p>

                <h3 class="text-3xl font-bold text-rose-600 mt-2">
                    Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}
                </h3>

            </div>

            <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center">

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

    {{-- SALDO --}}
    <div class="bg-gradient-to-r from-indigo-600 to-brand-600 rounded-2xl p-6 text-white">

        <p class="text-sm opacity-80">
            Saldo Akhir
        </p>

        <h3 class="text-3xl font-bold mt-2">
            Rp {{ number_format(($totalPemasukan ?? 0) - ($totalPengeluaran ?? 0), 0, ',', '.') }}
        </h3>

        <p class="text-xs mt-2 opacity-80">
            Total saldo keuangan gereja
        </p>

    </div>

</div>

{{-- GRAFIK --}}
<div class="bg-white border rounded-2xl p-6 shadow-sm">

    <div class="mb-5">

        <h3 class="text-xl font-bold text-slate-800">
            Grafik Keuangan Gereja
        </h3>

        <p class="text-sm text-slate-500 mt-1">
            Statistik pemasukan dan pengeluaran gereja
        </p>

    </div>

    <div class="h-[400px]">
        <canvas id="keuanganChart"></canvas>
    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('keuanganChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: ['Pemasukan', 'Pengeluaran', 'Saldo'],

        datasets: [{

            label: 'Total Keuangan',

            data: [
                {{ $totalPemasukan ?? 0 }},
                {{ $totalPengeluaran ?? 0 }},
                {{ ($totalPemasukan ?? 0) - ($totalPengeluaran ?? 0) }}
            ],

            backgroundColor: [
                'rgba(16,185,129,0.7)',
                'rgba(244,63,94,0.7)',
                'rgba(79,70,229,0.7)'
            ],

            borderRadius: 14,
            borderWidth: 0

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {
                display: false
            }

        },

        scales: {

            y: {

                beginAtZero: true,

                ticks: {

                    callback: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }

                }

            }

        }

    }

});

</script>

@endpush