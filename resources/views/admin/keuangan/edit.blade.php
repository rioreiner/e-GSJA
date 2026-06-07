@extends('layouts.admin')

@section('title','Edit Keuangan')
@section('page-title','Edit Transaksi Keuangan')
@section('breadcrumb','Keuangan')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white border rounded-2xl p-6">

        <h2 class="text-xl font-bold mb-6">
            Edit Transaksi Keuangan
        </h2>

        <form action="{{ route('admin.keuangan.update', $keuangan->id) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- Jenis --}}
            <div class="mb-4">
                <label class="text-sm font-semibold">Jenis</label>
                <select name="jenis" class="w-full border rounded-xl p-3 mt-1">
                    <option value="pemasukan" {{ $keuangan->jenis == 'pemasukan' ? 'selected' : '' }}>
                        Pemasukan
                    </option>
                    <option value="pengeluaran" {{ $keuangan->jenis == 'pengeluaran' ? 'selected' : '' }}>
                        Pengeluaran
                    </option>
                </select>
                @error('jenis') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-4">
                <label class="text-sm font-semibold">Kategori</label>
                <input type="text" name="kategori"
                       value="{{ old('kategori', $keuangan->kategori) }}"
                       class="w-full border rounded-xl p-3 mt-1">
                @error('kategori') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Jumlah --}}
            <div class="mb-4">
                <label class="text-sm font-semibold">Jumlah</label>
                <input type="number" name="jumlah"
                       value="{{ old('jumlah', $keuangan->jumlah) }}"
                       class="w-full border rounded-xl p-3 mt-1">
                @error('jumlah') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Tanggal --}}
            <div class="mb-4">
                <label class="text-sm font-semibold">Tanggal</label>
                <input type="date" name="tanggal"
                       value="{{ old('tanggal', \Carbon\Carbon::parse($keuangan->tanggal)->format('Y-m-d')) }}"
                       class="w-full border rounded-xl p-3 mt-1">
                @error('tanggal') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Keterangan --}}
            <div class="mb-6">
                <label class="text-sm font-semibold">Keterangan</label>
                <textarea name="keterangan" class="w-full border rounded-xl p-3 mt-1">
{{ old('keterangan', $keuangan->keterangan) }}
                </textarea>
            </div>

            {{-- Button --}}
            <div class="flex justify-end gap-3">

                <a href="{{ route('admin.keuangan.index') }}"
                   class="px-5 py-3 bg-gray-200 rounded-xl">
                    Batal
                </a>

                <button class="px-5 py-3 bg-blue-600 text-white rounded-xl">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection