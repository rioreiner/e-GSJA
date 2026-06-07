@extends('layouts.admin')

@section('title','Detail Jemaat')
@section('page-title','Detail Jemaat')
@section('breadcrumb','Detail Jemaat')

@section('content')

{{-- Header --}}
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Detail Jemaat</h2>
        <p class="text-sm text-slate-500 mt-1">Informasi lengkap data jemaat gereja</p>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('admin.jemaat.edit', $jemaat->id) }}" class="px-5 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold transition">
            Edit Data
        </a>
        <a href="{{ route('admin.jemaat.index') }}" class="px-5 py-3 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-semibold transition">
            Kembali
        </a>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Profile Card --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-brand-600 to-indigo-600 h-28"></div>
        <div class="px-6 pb-6 relative">

            {{-- FOTO PROFILE JEMAAT (SAMA DENGAN JALUR EDIT) --}}
            <div class="-mt-14 mb-4">
                <img src="{{ !empty($jemaat->foto) ? asset('uploads/jemaat/' . $jemaat->foto) : asset('images/default-avatar.png') }}"
                     alt="{{ $jemaat->nama_lengkap }}"
                     class="w-28 h-28 rounded-2xl border-4 border-white object-cover shadow-lg bg-white">
            </div>

            {{-- Nama --}}
            <div>
                <h3 class="text-xl font-bold text-slate-900">{{ $jemaat->nama_lengkap }}</h3>
                <p class="text-sm text-slate-500 mt-1">{{ $jemaat->nomor_anggota }}</p>
            </div>

            {{-- Badge --}}
            <div class="mt-5 flex flex-wrap gap-2">
                <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-xs font-semibold">
                    {{ $jemaat->jenis_kelamin }}
                </span>
                <span class="px-3 py-1 rounded-full {{ $jemaat->status_keanggotaan == 'Aktif' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }} text-xs font-semibold">
                    {{ $jemaat->status_keanggotaan }}
                </span>
            </div>
        </div>
    </div>

    {{-- Detail --}}
    <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-slate-900">Informasi Jemaat</h3>
                <p class="text-sm text-slate-500 mt-1">Data lengkap jemaat</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <p class="text-sm text-slate-500">Nomor Anggota</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->nomor_anggota }}</h4>
            </div>

            <div>
                <p class="text-sm text-slate-500">Nama Lengkap</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->nama_lengkap }}</h4>
            </div>

            <div>
                <p class="text-sm text-slate-500">Jenis Kelamin</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->jenis_kelamin }}</h4>
            </div>

            <div>
                <p class="text-sm text-slate-500">Umur</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->umur ?? '-' }} Tahun</h4>
            </div>

            <div>
                <p class="text-sm text-slate-500">Tanggal Lahir</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->tanggal_lahir?->format('d F Y') ?? '-' }}</h4>
            </div>

            <div>
                <p class="text-sm text-slate-500">No Telepon</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->no_telepon ?? '-' }}</h4>
            </div>

            <div>
                <p class="text-sm text-slate-500">Email</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->email ?? '-' }}</h4>
            </div>

            <div>
                <p class="text-sm text-slate-500">Status Pernikahan</p>
                <h4 class="font-semibold text-slate-900 mt-1">{{ $jemaat->status_pernikahan }}</h4>
            </div>

            <div class="md:col-span-2">
                <p class="text-sm text-slate-500">Alamat</p>
                <div class="mt-1 p-4 rounded-xl bg-slate-50 text-slate-700 text-sm leading-relaxed">
                    {{ $jemaat->alamat ?? 'Tidak ada alamat' }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection