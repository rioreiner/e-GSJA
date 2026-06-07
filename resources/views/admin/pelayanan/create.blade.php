@extends('layouts.admin')

@section('title','Tambah Pelayanan')
@section('page-title','Tambah Pelayanan')
@section('breadcrumb','Pelayanan')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-3xl p-8 text-white mb-6">
        <h2 class="text-3xl font-extrabold">Tambah Pelayanan</h2>
        <p class="text-indigo-100 mt-1">Tambahkan data pelayan untuk jadwal ibadah</p>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.pelayanan.store') }}" method="POST">
        @csrf

        <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden">

            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Jadwal Ibadah --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Jadwal Ibadah
                    </label>

                    <select name="jadwal_ibadah_id"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">

                        <option value="">-- Pilih Jadwal --</option>

                        @foreach($jadwalList as $j)
                            <option value="{{ $j->id }}"
                                {{ old('jadwal_ibadah_id', $selected) == $j->id ? 'selected' : '' }}>
                                {{ $j->nama_kegiatan }} - {{ $j->tanggal->format('d M Y') }}
                            </option>
                        @endforeach

                    </select>

                    @error('jadwal_ibadah_id')
                        <p class="text-rose-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Pelayan --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Pelayan
                    </label>

                    <input type="text"
                           name="nama_pelayan"
                           value="{{ old('nama_pelayan') }}"
                           placeholder="Contoh: John Doe"
                           class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">

                    @error('nama_pelayan')
                        <p class="text-rose-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jenis Pelayanan --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Jenis Pelayanan
                    </label>

                    <select name="jenis_pelayanan"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">

                        <option value="">-- Pilih Jenis --</option>

                        @foreach(\App\Models\Pelayanan::JENIS_PELAYANAN as $jenis)
                            <option value="{{ $jenis }}"
                                {{ old('jenis_pelayanan') == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach

                    </select>

                    @error('jenis_pelayanan')
                        <p class="text-rose-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Footer --}}
            <div class="px-8 py-6 bg-slate-50 border-t border-slate-100 flex justify-end gap-3">

                <a href="{{ route('admin.pelayanan.index') }}"
                   class="px-5 py-3 rounded-2xl bg-slate-200 text-slate-700 font-semibold">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-3 rounded-2xl bg-indigo-600 text-white font-bold">
                    Simpan
                </button>

            </div>

        </div>
    </form>

</div>

@endsection