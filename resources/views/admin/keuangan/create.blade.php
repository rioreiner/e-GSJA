@extends('layouts.admin')

@section('title','Tambah Keuangan')
@section('page-title','Tambah Keuangan')
@section('breadcrumb','Keuangan')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-3xl p-8 mb-6">

        <h2 class="text-3xl font-extrabold">
            Tambah Data Keuangan
        </h2>

        <p class="text-emerald-100 mt-1">
            Catat pemasukan dan pengeluaran gereja
        </p>

    </div>

    {{-- FORM --}}
    <form action="{{ route('admin.keuangan.store') }}"
          method="POST">

        @csrf

        <div class="bg-white border rounded-3xl overflow-hidden">

            {{-- HEADER FORM --}}
            <div class="px-8 py-6 border-b">
                <h3 class="text-xl font-bold text-slate-800">
                    Form Keuangan
                </h3>
            </div>

            {{-- BODY --}}
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- JENIS --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Jenis</label>

                    <select name="jenis"
                            class="w-full border rounded-2xl px-5 py-3">

                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>

                    </select>

                    @error('jenis')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KATEGORI --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Kategori</label>

                    <input type="text"
                           name="kategori"
                           value="{{ old('kategori') }}"
                           placeholder="Persembahan / Operasional / Donasi"
                           class="w-full border rounded-2xl px-5 py-3">

                    @error('kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- JUMLAH --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Jumlah</label>

                    <input type="number"
                           name="jumlah"
                           value="{{ old('jumlah') }}"
                           class="w-full border rounded-2xl px-5 py-3"
                           placeholder="0">

                    @error('jumlah')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TANGGAL --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Tanggal</label>

                    <input type="date"
                           name="tanggal"
                           value="{{ old('tanggal') }}"
                           class="w-full border rounded-2xl px-5 py-3">

                    @error('tanggal')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KETERANGAN --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-2">Keterangan</label>

                    <textarea name="keterangan"
                              rows="4"
                              class="w-full border rounded-2xl px-5 py-3"
                              placeholder="Catatan tambahan...">{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="px-8 py-6 bg-slate-50 border-t flex justify-end gap-3">

                <a href="{{ route('admin.keuangan.index') }}"
                   class="px-5 py-3 bg-slate-200 rounded-2xl font-semibold">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold">
                    Simpan
                </button>

            </div>

        </div>

    </form>

</div>

@endsection