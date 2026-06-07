@extends('layouts.admin')

@section('title','Jadwal Ibadah')
@section('page-title','Jadwal Ibadah')
@section('breadcrumb','Jadwal')

@section('content')

{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">
            Jadwal Ibadah
        </h2>
        <p class="text-sm text-slate-500 mt-1">
            Kelola jadwal ibadah dan kegiatan gereja
        </p>
    </div>

    <a href="{{ route('admin.jadwal.create') }}"
       class="inline-flex items-center gap-2 px-5 py-3 bg-brand-600 hover:bg-brand-700
              text-white rounded-xl text-sm font-semibold transition shadow-lg shadow-brand-600/20">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Jadwal
    </a>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
    {{-- Total --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">
                    Total Jadwal
                </p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-2">
                    {{ $jadwal->total() }}
                </h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-brand-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Minggu Ini --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">
                    Jadwal Minggu Ini
                </p>
                <h3 class="text-3xl font-extrabold text-emerald-600 mt-2">
                    {{ $mingguIni ?? 0 }}
                </h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Aktif --}}
    <div class="bg-gradient-to-r from-brand-600 to-indigo-600 rounded-2xl p-5 text-white">
        <p class="text-sm text-brand-100">
            Jadwal Aktif
        </p>
        <h3 class="text-3xl font-extrabold mt-2">
            {{ $aktif ?? 0 }}
        </h3>
        <p class="text-xs text-brand-100 mt-2">
            Jadwal tersedia saat ini
        </p>
    </div>
</div>

{{-- Table --}}
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    {{-- Top --}}
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-slate-800">
                Data Jadwal
            </h3>
            <p class="text-sm text-slate-500 mt-1">
                Semua jadwal kegiatan dan ibadah gereja
            </p>
        </div>
    </div>

    {{-- Table Component --}}
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Nama Kegiatan
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Hari
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Jam
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Lokasi
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Pendeta
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Tema
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($jadwal as $item)
                <tr class="hover:bg-slate-50 transition">
                    {{-- Nama --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-slate-800">
                                    {{ $item->nama_kegiatan }}
                                </p>
                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $item->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </td>

                    {{-- Hari --}}
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-xs font-semibold">
                            {{ $item->tanggal->translatedFormat('l') }}
                        </span>
                    </td>

                    {{-- Jam --}}
                    <td class="px-6 py-4 text-sm font-semibold text-slate-700">
                        {{ $item->waktu }}
                    </td>

                    {{-- Lokasi --}}
                    <td class="px-6 py-4 text-sm text-slate-600">
                        {{ $item->lokasi }}
                    </td>

                    {{-- Pendeta --}}
                    <td class="px-6 py-4 text-sm text-slate-600">
                        {{ $item->pendeta }}
                    </td>

                    {{-- Tema --}}
                    <td class="px-6 py-4 text-sm text-slate-600">
                        {{ $item->tema }}
                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            {{-- Edit --}}
                            <a href="{{ route('admin.jadwal.edit', $item->id) }}"
                               class="px-3 py-1.5 rounded-lg bg-amber-100 text-amber-700 text-xs font-semibold hover:bg-amber-200 transition">
                                Edit
                            </a>

                            {{-- Delete Form (SweetAlert Terintegrasi via class js-delete-confirm) --}}
                            <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" class="inline js-delete-confirm">
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
                    <td colspan="7" class="px-6 py-10 text-center text-slate-400">
                        Belum ada jadwal tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $jadwal->links() }}
    </div>
</div>

@endsection