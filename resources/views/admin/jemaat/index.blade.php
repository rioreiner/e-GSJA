@extends('layouts.admin')
@section('title','Data Jemaat')
@section('page-title','Data Jemaat')
@section('breadcrumb','Jemaat')

@section('content')
{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h2 class="text-xl font-bold text-slate-900">Data Jemaat</h2>
        <p class="text-sm text-slate-500 mt-0.5">Total <strong>{{ $jemaat->total() }}</strong> jemaat terdaftar</p>
    </div>
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.jemaat.export-pdf', request()->query()) }}" class="btn btn-sm bg-rose-600 hover:bg-rose-700 text-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            PDF
        </a>
        <a href="{{ route('admin.jemaat.trash') }}" class="btn btn-sm btn-secondary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Sampah
        </a>
        <a href="{{ route('admin.jemaat.create') }}" class="btn btn-sm btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Jemaat
        </a>
    </div>
</div>

{{-- Stats Bar --}}
<div class="grid grid-cols-3 gap-4 mb-5">
    @foreach([['Total','slate',$stats['total']],['Aktif','emerald',$stats['aktif']],['Tidak Aktif','amber',$stats['tidak_aktif']]] as [$l,$c,$v])
    <div class="card p-4 text-center">
        <p class="text-2xl font-extrabold text-slate-900">{{ $v }}</p>
        <p class="text-xs font-semibold text-slate-500 mt-0.5 uppercase tracking-wide">{{ $l }}</p>
    </div>
    @endforeach
</div>

{{-- Filters --}}
<div class="card p-4 mb-5">
    <form method="GET" action="{{ route('admin.jemaat.index') }}" class="flex flex-wrap gap-3 items-end">
        {{-- Search --}}
        <div class="flex-1 min-w-48">
            <label class="form-label">Cari</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama, nomor, email..." class="form-control pl-9">
            </div>
        </div>
        {{-- Status Keanggotaan --}}
        <div class="min-w-36">
            <label class="form-label">Status Keanggotaan</label>
            <select name="status_keanggotaan" class="form-control form-select">
                <option value="">Semua</option>
                @foreach(['Aktif','Tidak Aktif','Pindah','Meninggal'] as $s)
                <option value="{{ $s }}" {{ request('status_keanggotaan')===$s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
        </div>
        {{-- Jenis Kelamin --}}
        <div class="min-w-32">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control form-select">
                <option value="">Semua</option>
                <option value="Laki-laki" {{ request('jenis_kelamin')==='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ request('jenis_kelamin')==='Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <a href="{{ route('admin.jemaat.index') }}" class="btn btn-secondary btn-sm">Reset</a>
        </div>
    </form>
</div>

{{-- Table --}}
<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="th w-12">#</th>
                    <th class="th">Jemaat</th>
                    <th class="th">No. Anggota</th>
                    <th class="th">Kontak</th>
                    <th class="th">Status Nikah</th>
                    <th class="th">Keanggotaan</th>
                    <th class="th text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($jemaat as $i => $j)
                <tr class="hover:bg-slate-50/60 transition-colors">
                    <td class="td text-slate-400 text-xs">{{ $jemaat->firstItem() + $i }}</td>
                    <td class="td">
                        <div class="flex items-center gap-3">
                            {{-- MENAMPILKAN FOTO FULL DARI PATH LAMA --}}
                            @if($j->foto && file_exists(public_path('uploads/foto/'.$j->foto)))
                                <img src="{{ asset('uploads/foto/'.$j->foto) }}" alt="{{ $j->nama_lengkap }}"
                                     class="w-9 h-9 rounded-full object-cover flex-shrink-0 ring-2 ring-slate-100">
                            @else
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-violet-500 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                    {{ strtoupper(substr($j->nama_lengkap,0,1)) }}
                                </div>
                            @endif
                            <div>
                                <p class="text-sm font-semibold text-slate-800">{{ $j->nama_lengkap }}</p>
                                <p class="text-xs text-slate-400">{{ $j->jenis_kelamin }} · {{ $j->tanggal_lahir?->format('d/m/Y') ?? '-' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="td">
                        <span class="font-mono text-xs bg-slate-100 text-slate-700 px-2 py-1 rounded-lg">{{ $j->nomor_anggota }}</span>
                    </td>
                    <td class="td">
                        <p class="text-sm text-slate-700">{{ $j->no_telepon ?? '-' }}</p>
                        <p class="text-xs text-slate-400">{{ $j->email ?? '-' }}</p>
                    </td>
                    <td class="td">
                        @php
                            $nc = match($j->status_pernikahan) {
                                'Menikah' => 'badge-emerald',
                                'Cerai'   => 'badge-rose',
                                'Janda','Duda' => 'badge-amber',
                                default   => 'badge-slate'
                            };
                        @endphp
                        <span class="badge {{ $nc }}">{{ $j->status_pernikahan }}</span>
                    </td>
                    <td class="td">
                        @php
                            $kc = match($j->status_keanggotaan) {
                                'Aktif'      => 'badge-emerald',
                                'Tidak Aktif'=> 'badge-amber',
                                'Pindah'     => 'badge-blue',
                                'Meninggal'  => 'badge-rose',
                                default      => 'badge-slate'
                            };
                        @endphp
                        <span class="badge {{ $kc }}">{{ $j->status_keanggotaan }}</span>
                    </td>
                    <td class="td text-right">
                        <div class="flex items-center justify-end gap-1">
                            <a href="{{ route('admin.jemaat.show',$j) }}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition-colors" title="Detail">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <a href="{{ route('admin.jemaat.edit',$j) }}" class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 flex items-center justify-center transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            
                            {{-- DIUBAH MENGGUNAKAN CLASS JS-DELETE-CONFIRM UNTUK SWEETALERT --}}
                            <form method="POST" action="{{ route('admin.jemaat.destroy',$j) }}" class="inline js-delete-confirm">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 flex items-center justify-center transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-16 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center">
                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <p class="text-sm font-semibold text-slate-500">Belum ada data jemaat</p>
                            <a href="{{ route('admin.jemaat.create') }}" class="btn btn-primary btn-sm">Tambah Sekarang</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($jemaat->hasPages())
    <div class="px-5 py-4 border-t border-slate-100">
        {{ $jemaat->withQueryString()->links('components.pagination') }}
    </div>
    @endif
</div>
@endsection