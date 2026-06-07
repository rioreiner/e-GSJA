@extends('layouts.admin')

@section('title','Data Keuangan')
@section('page-title','Keuangan')
@section('breadcrumb','Keuangan')

@section('content')

{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">

    <div>
        <h2 class="text-2xl font-bold text-slate-900">
            Data Keuangan
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Kelola pemasukan dan pengeluaran gereja
        </p>
    </div>

    <a href="{{ route('admin.keuangan.create') }}"
       class="inline-flex items-center gap-2 px-5 py-3 bg-brand-600 hover:bg-brand-700
              text-white rounded-xl text-sm font-semibold transition shadow-lg shadow-brand-600/20">

        <svg class="w-4 h-4"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 4v16m8-8H4"/>
        </svg>

        Tambah Transaksi

    </a>

</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

    {{-- Pemasukan --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-slate-500">
                    Total Pemasukan
                </p>

                <h3 class="text-2xl font-extrabold text-emerald-600 mt-2">
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

    {{-- Pengeluaran --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-slate-500">
                    Total Pengeluaran
                </p>

                <h3 class="text-2xl font-extrabold text-rose-600 mt-2">
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

    {{-- Saldo --}}
    <div class="bg-gradient-to-r from-brand-600 to-indigo-600 rounded-2xl p-5 text-white">

        <p class="text-sm text-brand-100">
            Saldo Kas Gereja
        </p>

        <h3 class="text-2xl font-extrabold mt-2">
            Rp {{ number_format(($totalPemasukan ?? 0) - ($totalPengeluaran ?? 0), 0, ',', '.') }}
        </h3>

        <p class="text-xs text-brand-100 mt-2">
            Total saldo saat ini
        </p>

    </div>

</div>

{{-- Table --}}
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">

    {{-- Header Table --}}
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">

        <div>
            <h3 class="text-lg font-bold text-slate-800">
                Riwayat Transaksi
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Semua data transaksi keuangan gereja
            </p>
        </div>

    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Kategori
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Jenis
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Tanggal
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Jumlah
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse($keuangan as $item)

                <tr class="hover:bg-slate-50 transition">

                    {{-- Kategori --}}
                    <td class="px-6 py-4">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl flex items-center justify-center
                                {{ $item->jenis == 'pemasukan'
                                    ? 'bg-emerald-100'
                                    : 'bg-rose-100' }}">

                                @if($item->jenis == 'pemasukan')

                                    <svg class="w-5 h-5 text-emerald-600"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                    </svg>

                                @else

                                    <svg class="w-5 h-5 text-rose-600"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                    </svg>

                                @endif

                            </div>

                            <div>

                                <p class="font-semibold text-slate-800">
                                    {{ $item->kategori }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                                </p>

                            </div>

                        </div>

                    </td>

                    {{-- Jenis --}}
                    <td class="px-6 py-4">

                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $item->jenis == 'pemasukan'
                                ? 'bg-emerald-100 text-emerald-700'
                                : 'bg-rose-100 text-rose-700' }}">

                            {{ ucfirst($item->jenis) }}

                        </span>

                    </td>

                    {{-- Tanggal --}}
                    <td class="px-6 py-4 text-sm text-slate-600">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </td>

                    {{-- Jumlah --}}
                    <td class="px-6 py-4">

                        <span class="font-bold
                            {{ $item->jenis == 'pemasukan'
                                ? 'text-emerald-600'
                                : 'text-rose-600' }}">

                            {{ $item->jenis == 'pemasukan' ? '+' : '-' }}
                            Rp {{ number_format($item->jumlah, 0, ',', '.') }}

                        </span>

                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-4">

                        <div class="flex items-center justify-center gap-2">

                            {{-- Edit --}}
                            <a href="{{ route('admin.keuangan.edit', $item->id) }}"
                               class="px-3 py-1.5 rounded-lg bg-amber-100 text-amber-700
                                      text-xs font-semibold hover:bg-amber-200 transition">

                                Edit

                            </a>

                            {{-- Delete Form (SweetAlert Terintegrasi via class js-delete-confirm) --}}
                            <form action="{{ route('admin.keuangan.destroy', $item->id) }}" 
                                  method="POST" 
                                  class="inline-block js-delete-confirm">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-semibold hover:bg-rose-200 transition">
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="px-6 py-10 text-center text-slate-400">

                        Belum ada data transaksi

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-slate-100">

        {{ $keuangan->links() }}

    </div>

</div>

@endsection