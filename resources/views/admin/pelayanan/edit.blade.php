@extends('layouts.admin')

@section('title','Edit Pelayanan')
@section('page-title','Edit Pelayanan')
@section('breadcrumb','Pelayanan')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-indigo-600 to-violet-600 text-white rounded-3xl p-8 mb-6">

        <h2 class="text-3xl font-extrabold">
            Edit Pelayanan
        </h2>

        <p class="text-indigo-100 mt-1">
            Perbarui data pelayanan gereja
        </p>

    </div>

    {{-- FORM --}}
    <form action="{{ route('admin.pelayanan.update', $pelayanan->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="bg-white border rounded-3xl overflow-hidden">

            <div class="px-8 py-6 border-b">
                <h3 class="text-xl font-bold text-slate-800">
                    Form Edit Pelayanan
                </h3>
            </div>

            <div class="p-8 space-y-6">

                {{-- JADWAL --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Jadwal Ibadah
                    </label>

                    <select name="jadwal_ibadah_id"
                            class="w-full border rounded-2xl px-5 py-3">

                        @foreach($jadwalList as $jadwal)
                            <option value="{{ $jadwal->id }}"
                                {{ $pelayanan->jadwal_ibadah_id == $jadwal->id ? 'selected' : '' }}>
                                {{ $jadwal->nama_kegiatan }} - {{ $jadwal->tanggal }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- NAMA PELAYAN --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Nama Pelayan
                    </label>

                    <input type="text"
                           name="nama_pelayan"
                           value="{{ old('nama_pelayan', $pelayanan->nama_pelayan) }}"
                           class="w-full border rounded-2xl px-5 py-3">

                    @error('nama_pelayan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- JENIS --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Jenis Pelayanan
                    </label>

                    <select name="jenis_pelayanan"
                            class="w-full border rounded-2xl px-5 py-3">

                        @foreach(\App\Models\Pelayanan::JENIS_PELAYANAN as $jenis)
                            <option value="{{ $jenis }}"
                                {{ $pelayanan->jenis_pelayanan == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="px-8 py-6 bg-slate-50 border-t flex justify-end gap-3">

                <a href="{{ route('admin.pelayanan.index') }}"
                   class="px-5 py-3 bg-slate-200 rounded-2xl font-semibold">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold">
                    Update
                </button>

            </div>

        </div>

    </form>

</div>

@endsection