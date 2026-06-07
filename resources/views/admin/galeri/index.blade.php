@extends('layouts.admin')

@section('title', 'Galeri Foto')
@section('page-title', 'Galeri Foto')
@section('breadcrumb', 'Galeri')

@section('content')

{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">

    <div>
        <h2 class="text-2xl font-bold text-slate-900">
            Galeri Foto
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Kelola dokumentasi foto kegiatan dan momen gereja
        </p>
    </div>

    {{-- Tombol dialihkan ke index sementara / sesuaikan jika ada modal tambah data --}}
    <a href="{{ route('admin.galeri.create') }}"
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

        Tambah Foto

    </a>

</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

    {{-- Total --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-slate-500">
                    Total Foto
                </p>

                <h3 class="text-3xl font-extrabold text-slate-900 mt-2">
                    {{ $galeri->total() }}
                </h3>
            </div>

            <div class="w-12 h-12 rounded-xl bg-brand-100 flex items-center justify-center">

                <svg class="w-6 h-6 text-brand-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>

            </div>

        </div>

    </div>

    {{-- Kategori / Album --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-slate-500">
                    Total Kategori
                </p>

                <h3 class="text-3xl font-extrabold text-emerald-600 mt-2">
                    {{ $totalKategori ?? 0 }}
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
                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>

            </div>

        </div>

    </div>

    {{-- Highlight Utama --}}
    <div class="bg-gradient-to-r from-brand-600 to-indigo-600 rounded-2xl p-5 text-white">

        <p class="text-sm text-brand-100">
            Foto Utama Aktif
        </p>

        <h3 class="text-3xl font-extrabold mt-2">
            {{ $fotoUtama ?? 0 }}
        </h3>

        <p class="text-xs text-brand-100 mt-2">
            Foto yang ditampilkan di beranda depan
        </p>

    </div>

</div>

{{-- Table --}}
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">

    {{-- Top --}}
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">

        <div>
            <h3 class="text-lg font-bold text-slate-800">
                Data Galeri
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Semua daftar dokumentasi foto kegiatan
            </p>
        </div>

    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Foto / Judul
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Kategori
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Deskripsi
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase">
                        Status Utama
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse($galeri as $item)

                <tr class="hover:bg-slate-50 transition">

                    {{-- Foto & Judul --}}
                    <td class="px-6 py-4">

                        <div class="flex items-center gap-4">

                            {{-- FIXED: Menyesuaikan ke path asset('uploads/galeri/') dan field $item->foto --}}
                            <div class="w-16 h-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200 flex-shrink-0">
                                @if($item->foto)
                                    <img src="{{ asset('uploads/galeri/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div>

                                <p class="font-semibold text-slate-800 line-clamp-1">
                                    {{ $item->judul }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Uploaded: {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                                </p>

                            </div>

                        </div>

                    </td>

                    {{-- Kategori --}}
                    <td class="px-6 py-4">

                        <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-xs font-semibold">
                            {{ $item->kategori ?? 'Umum' }}
                        </span>

                    </td>

                    {{-- Deskripsi --}}
                    <td class="px-6 py-4 text-sm text-slate-600 max-w-xs truncate">
                        {{ $item->deskripsi ?? '-' }}
                    </td>

                    {{-- Status Utama --}}
                    <td class="px-6 py-4 text-center">
                        @if(isset($item->is_utama) && $item->is_utama)
                            <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-semibold">
                                Utama
                            </span>
                        @else
                            <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">
                                Biasa
                            </span>
                        @endif
                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-4">

                        <div class="flex items-center justify-center gap-2">

                            {{-- Edit --}}
                            <a href="{{ route('admin.galeri.index', ['edit' => $item->id]) }}"
                               class="px-3 py-1.5 rounded-lg bg-amber-100 text-amber-700
                                      text-xs font-semibold hover:bg-amber-200 transition">
                                Edit
                            </a>

                            {{-- Delete Form (SweetAlert Terintegrasi via class js-delete-confirm) --}}
                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="inline js-delete-confirm">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1.5 rounded-lg bg-rose-100 text-rose-700 text-xs font-semibold hover:bg-rose-200 transition">
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

                        Belum ada foto tersedia di galeri

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-slate-100">

        {{ $galeri->links() }}

    </div>

</div>

@endsection