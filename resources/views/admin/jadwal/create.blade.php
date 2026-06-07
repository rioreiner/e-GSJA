{{-- resources/views/admin/jadwal/create.blade.php --}}

@extends('layouts.admin')

@section('title', 'Tambah Jadwal Ibadah')
@section('page-title', 'Tambah Jadwal')
@section('breadcrumb', 'Jadwal Ibadah')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-extrabold text-slate-900">
            Tambah Jadwal Ibadah
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Tambahkan jadwal kegiatan dan ibadah gereja
        </p>
    </div>

    {{-- Error --}}
    @if ($errors->any())
        <div class="mb-5 rounded-2xl border border-rose-200 bg-rose-50 p-4">
            <div class="flex items-start gap-3">

                <div class="w-10 h-10 rounded-xl bg-rose-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-rose-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4m0 4h.01M5.07 19H18.93c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                    </svg>
                </div>

                <div>
                    <h4 class="font-bold text-rose-700">
                        Terjadi Kesalahan
                    </h4>

                    <ul class="mt-2 text-sm text-rose-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.jadwal.store') }}"
          method="POST"
          class="space-y-6">

        @csrf

        <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50">

                <h3 class="text-lg font-bold text-slate-800">
                    Form Jadwal Ibadah
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Isi data jadwal dengan lengkap
                </p>

            </div>

            {{-- Form Content --}}
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Kegiatan --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Kegiatan
                    </label>

                    <input type="text"
                           name="nama_kegiatan"
                           value="{{ old('nama_kegiatan') }}"
                           placeholder="Contoh: Ibadah Minggu"
                           class="w-full rounded-2xl border border-slate-300
                                  focus:border-brand-500 focus:ring focus:ring-brand-200
                                  px-4 py-3 text-sm">
                </div>

                {{-- Hari --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Hari
                    </label>

                    <select name="hari"
                            class="w-full rounded-2xl border border-slate-300
                                   focus:border-brand-500 focus:ring focus:ring-brand-200
                                   px-4 py-3 text-sm">

                        <option value="">Pilih Hari</option>

                        @foreach([
                            'Senin',
                            'Selasa',
                            'Rabu',
                            'Kamis',
                            'Jumat',
                            'Sabtu',
                            'Minggu'
                        ] as $hari)

                            <option value="{{ $hari }}"
                                {{ old('hari') == $hari ? 'selected' : '' }}>
                                {{ $hari }}
                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Waktu --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Waktu Ibadah
                    </label>

                    <input type="time"
                           name="waktu"
                           value="{{ old('waktu') }}"
                           class="w-full rounded-2xl border border-slate-300
                                  focus:border-brand-500 focus:ring focus:ring-brand-200
                                  px-4 py-3 text-sm">
                </div>

                {{-- Tanggal --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           value="{{ old('tanggal') }}"
                           class="w-full rounded-2xl border border-slate-300
                                  focus:border-brand-500 focus:ring focus:ring-brand-200
                                  px-4 py-3 text-sm">
                </div>

                {{-- Lokasi --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Lokasi
                    </label>

                    <input type="text"
                           name="lokasi"
                           value="{{ old('lokasi') }}"
                           placeholder="Contoh: Gereja Pusat"
                           class="w-full rounded-2xl border border-slate-300
                                  focus:border-brand-500 focus:ring focus:ring-brand-200
                                  px-4 py-3 text-sm">
                </div>

                {{-- Keterangan --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              rows="5"
                              placeholder="Tambahkan catatan atau informasi tambahan..."
                              class="w-full rounded-2xl border border-slate-300
                                     focus:border-brand-500 focus:ring focus:ring-brand-200
                                     px-4 py-3 text-sm resize-none">{{ old('keterangan') }}</textarea>
                </div>

            </div>

            {{-- Footer --}}
            <div class="px-6 py-5 border-t border-slate-100 bg-slate-50 flex items-center justify-end gap-3">

                <a href="{{ route('admin.jadwal.index') }}"
                   class="px-5 py-3 rounded-2xl border border-slate-300
                          text-slate-700 text-sm font-semibold
                          hover:bg-slate-100 transition">

                    Batal

                </a>

                <button type="submit"
                        class="px-6 py-3 rounded-2xl bg-brand-600 hover:bg-brand-700
                               text-white text-sm font-bold shadow-lg
                               shadow-brand-600/20 transition">

                    Simpan Jadwal

                </button>

            </div>

        </div>

    </form>

</div>

@endsection