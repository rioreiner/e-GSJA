@extends('layouts.admin')

@section('title','Tambah Jemaat')
@section('page-title','Tambah Jemaat')
@section('breadcrumb','Jemaat')

@section('content')

@if ($errors->any())
    <div class="mb-5 rounded-xl bg-rose-50 border border-rose-200 p-4">
        <div class="font-bold text-rose-700 mb-2">
            Terjadi kesalahan:
        </div>

        <ul class="list-disc list-inside text-sm text-rose-600 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST"
      action="{{ route('admin.jemaat.store') }}"
      enctype="multipart/form-data">

    @csrf

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">

        <div>
            <h2 class="text-2xl font-bold text-slate-900">
                Tambah Jemaat
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Tambahkan data jemaat baru gereja
            </p>
        </div>

        <button type="submit"
                class="px-5 py-3 bg-brand-600 hover:bg-brand-700
                       text-white rounded-xl text-sm font-semibold
                       shadow-lg shadow-brand-600/20 transition">

            Simpan Data

        </button>

    </div>

    {{-- Card --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            {{-- Nomor Anggota --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nomor Anggota
                </label>

                <input type="text"
                       value="{{ $nomorAnggota }}"
                       readonly
                       class="w-full rounded-xl border-slate-200 bg-slate-100
                              focus:ring-brand-500 focus:border-brand-500">
            </div>

            {{-- Nama Lengkap --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="nama_lengkap"
                       value="{{ old('nama_lengkap') }}"
                       class="w-full rounded-xl border-slate-200
                              focus:ring-brand-500 focus:border-brand-500">

                @error('nama_lengkap')
                    <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Jenis Kelamin
                </label>

                <select name="jenis_kelamin"
                        class="w-full rounded-xl border-slate-200
                               focus:ring-brand-500 focus:border-brand-500">

                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>

                </select>
            </div>

            {{-- Tanggal Lahir --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Tanggal Lahir
                </label>

                <input type="date"
                       name="tanggal_lahir"
                       value="{{ old('tanggal_lahir') }}"
                       class="w-full rounded-xl border-slate-200
                              focus:ring-brand-500 focus:border-brand-500">
            </div>

            {{-- Nomor Telepon --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nomor Telepon
                </label>

                <input type="text"
                       name="no_telepon"
                       value="{{ old('no_telepon') }}"
                       class="w-full rounded-xl border-slate-200
                              focus:ring-brand-500 focus:border-brand-500">
            </div>

            {{-- Status Pernikahan --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Status Pernikahan
                </label>

                <select name="status_pernikahan"
                        class="w-full rounded-xl border-slate-200
                               focus:ring-brand-500 focus:border-brand-500">

                    <option value="">Pilih</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>

                </select>
            </div>

            {{-- Status Keanggotaan --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Status Keanggotaan
                </label>

                <select name="status_keanggotaan"
                        class="w-full rounded-xl border-slate-200
                               focus:ring-brand-500 focus:border-brand-500">

                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>

                </select>
            </div>

            {{-- Alamat --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Alamat
                </label>

                <textarea name="alamat"
                          rows="4"
                          class="w-full rounded-xl border-slate-200
                                 focus:ring-brand-500 focus:border-brand-500">{{ old('alamat') }}</textarea>
            </div>

            {{-- Foto --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Foto Jemaat
                </label>

                <input type="file"
                       name="foto"
                       class="w-full rounded-xl border-slate-200
                              focus:ring-brand-500 focus:border-brand-500">
            </div>

        </div>

    </div>

</form>

@endsection