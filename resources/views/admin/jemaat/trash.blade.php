@extends('layouts.admin')

@section('title', 'Tempat Sampah - Data Jemaat')
@section('page-title', 'Tempat Sampah')
@section('breadcrumb', 'Trash')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-3 shadow-sm animate-fade-in">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                <svg class="w-7 h-7 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Trash Data Jemaat
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Daftar data jemaat yang telah dihapus sementara. Anda dapat memulihkan atau menghapusnya secara permanen.
            </p>
        </div>

        <div>
            <a href="{{ route('admin.jemaat.index') }}"
               class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-semibold transition bg-white shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Utama
            </a>
        </div>
    </div>

    {{-- Data Table / Card Grid --}}
    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">
        @if($jemaat->isEmpty())
            <div class="p-16 text-center">
                <div class="w-20 h-20 bg-slate-50 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-slate-100">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800">Tempat Sampah Kosong</h3>
                <p class="text-slate-500 text-sm mt-1 max-w-sm mx-auto">Tidak ada data jemaat yang berada di dalam folder penghapusan sementara saat ini.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-200 text-xs font-bold text-slate-600 uppercase tracking-wider">
                            <th class="px-6 py-4">Jemaat</th>
                            <th class="px-6 py-4">Nomor Anggota</th>
                            <th class="px-6 py-4">Gender / Umur</th>
                            <th class="px-6 py-4">Tanggal Dihapus</th>
                            <th class="px-6 py-4 text-right">Aksi Pemulihan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                        @foreach($jemaat as $item)
                            <tr class="hover:bg-slate-50/50 transition">
                                {{-- Kolom Foto & Nama --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ !empty($item->foto) ? asset('uploads/jemaat/' . $item->foto) : asset('images/default-avatar.png') }}"
                                             alt="{{ $item->nama_lengkap }}"
                                             class="w-11 h-11 rounded-xl object-cover border border-slate-200 bg-white shadow-sm flex-shrink-0">
                                        <div>
                                            <span class="font-bold text-slate-900 block">{{ $item->nama_lengkap }}</span>
                                            <span class="text-xs text-slate-400 block mt-0.5">{{ $item->email ?? '-' }}</span>
                                        </div>
                                    </div>
                                </td>
                                
                                {{-- Kolom No Anggota --}}
                                <td class="px-6 py-4 font-semibold text-slate-600">
                                    {{ $item->nomor_anggota }}
                                </td>
                                
                                {{-- Kolom Info Gender --}}
                                <td class="px-6 py-4">
                                    <div class="space-y-1">
                                        <span class="inline-block px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700 text-xs font-medium">
                                            {{ $item->jenis_kelamin }}
                                        </span>
                                        <span class="text-xs text-slate-400 block">{{ $item->umur ?? '-' }} Tahun</span>
                                    </div>
                                </td>
                                
                                {{-- Kolom Tanggal Delete --}}
                                <td class="px-6 py-4 text-slate-500">
                                    {{ $item->deleted_at?->translatedFormat('d M Y, H:i') ?? '-' }}
                                </td>
                                
                                {{-- Tombol Aksi Kerja --}}
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        
                                        {{-- Tombol Restore --}}
                                        <form action="{{ route('admin.jemaat.restore', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-xs font-bold transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 10H18"/>
                                                </svg>
                                                Restore
                                            </button>
                                        </form>

                                        {{-- Tombol Force Delete --}}
                                        <form action="{{ route('admin.jemaat.force-delete', $item->id) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data jemaat ini secara PERMANEN? Foto dan berkas akan dihapus selamanya dari sistem.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Hapus Permanen
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination Footer --}}
            @if($jemaat->hasPages())
                <div class="px-6 py-4 border-t border-slate-200 bg-slate-50/50">
                    {{ $jemaat->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection