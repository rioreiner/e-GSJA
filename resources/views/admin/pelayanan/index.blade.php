@extends('layouts.admin')

@section('title','Data Pelayanan')
@section('page-title','Pelayanan')
@section('breadcrumb','Pelayanan')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">
            Data Pelayanan
        </h2>
        <p class="text-sm text-slate-500 mt-1">
            Kelola seluruh data pelayanan gereja
        </p>
    </div>
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.pelayanan.export-pdf', request()->query()) }}" class="btn btn-sm bg-rose-600 hover:bg-rose-700 text-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            PDF
        </a>
        <a href="{{ route('admin.pelayanan.create') }}"
           class="inline-flex items-center gap-2 px-5 py-3 bg-brand-600 hover:bg-brand-700
                  text-white rounded-xl text-sm font-semibold transition shadow-lg">
            Tambah Pelayanan
        </a>
    </div>
</div>

{{-- TABLE --}}
<div class="bg-white border rounded-2xl overflow-hidden">
    <div class="px-6 py-4 border-b">
        <h3 class="text-lg font-bold text-slate-800">
            Data Pelayanan
        </h3>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase">Nama Pelayan</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase">Jenis</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase">Jadwal Ibadah</th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($pelayanan as $item)
                <tr class="hover:bg-slate-50 transition">
                    {{-- NAMA --}}
                    <td class="px-6 py-4 font-semibold text-slate-800">
                        {{ $item->nama_pelayan }}
                    </td>

                    {{-- JENIS (Sintaks tag td penutup yang rusak telah diperbaiki) --}}
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs">
                            {{ $item->jenis_pelayanan }}
                        </span>
                    </td>
                    
                    {{-- JADWAL IBADAH --}}
                    <td class="px-6 py-4">
                        @if($item->jadwalIbadah)
                            <div class="flex flex-col">
                                <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs inline-block w-fit">
                                    {{ $item->jadwalIbadah->nama_kegiatan }}
                                </span>
                                <span class="text-xs text-slate-500 mt-1">
                                    {{ $item->jadwalIbadah->tanggal?->format('d M Y') }}
                                </span>
                            </div>
                        @else
                            <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-xs">
                                Belum ada jadwal
                            </span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.pelayanan.edit', $item->id) }}"
                               class="px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-semibold hover:bg-amber-200 transition">
                                Edit
                            </a>

                            {{-- Delete Form (SweetAlert Terintegrasi via class js-delete-confirm) --}}
                            <form action="{{ route('admin.pelayanan.destroy', $item->id) }}" 
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
                    <td colspan="4" class="text-center py-10 text-slate-400">
                        Belum ada data pelayanan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t">
        {{ $pelayanan->links() }}
    </div>
</div>

@endsection