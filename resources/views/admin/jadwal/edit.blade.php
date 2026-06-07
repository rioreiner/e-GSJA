@extends('layouts.admin')

@section('title','Edit Jadwal Ibadah')
@section('page-title','Edit Jadwal')
@section('breadcrumb','Jadwal')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-6">

        <div class="bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600 rounded-3xl p-8 text-white shadow-xl">

            <div class="flex items-center gap-5">

                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                    <svg class="w-8 h-8"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10m-7 4h4m-9 5h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                    </svg>

                </div>

                <div>

                    <h1 class="text-3xl font-black">
                        Edit Jadwal Ibadah
                    </h1>

                    <p class="text-indigo-100 mt-1">
                        Update data jadwal ibadah gereja
                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            {{-- BODY --}}
            <div class="p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- NAMA KEGIATAN --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Nama Kegiatan
                        </label>

                        <input type="text"
                               name="nama_kegiatan"
                               value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan) }}"
                               class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                        @error('nama_kegiatan')
                            <p class="text-rose-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- TANGGAL --}}
                    <div>

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               value="{{ old('tanggal', $jadwal->tanggal ? $jadwal->tanggal->format('Y-m-d') : '') }}"
                               class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">

                        @error('tanggal')
                            <p class="text-rose-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- WAKTU --}}
                    <div>

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Waktu
                        </label>

                        <input type="time"
                               name="waktu"
                               value="{{ old('waktu', $jadwal->waktu) }}"
                               class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">

                        @error('waktu')
                            <p class="text-rose-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- LOKASI --}}
                    <div>

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Lokasi
                        </label>

                        <input type="text"
                               name="lokasi"
                               value="{{ old('lokasi', $jadwal->lokasi) }}"
                               class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">

                        @error('lokasi')
                            <p class="text-rose-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- PENDETA --}}
                    <div>

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Pendeta
                        </label>

                        <input type="text"
                               name="pendeta"
                               value="{{ old('pendeta', $jadwal->pendeta) }}"
                               class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">

                        @error('pendeta')
                            <p class="text-rose-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- TEMA --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Tema Firman
                        </label>

                        <textarea name="tema"
                                  rows="5"
                                  class="w-full rounded-2xl border border-slate-300 px-5 py-3 focus:ring-2 focus:ring-indigo-500">{{ old('tema', $jadwal->tema) }}</textarea>

                        @error('tema')
                            <p class="text-rose-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="px-8 py-6 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">

                <a href="{{ route('admin.jadwal.index') }}"
                   class="px-5 py-3 rounded-2xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold transition">

                    Batal

                </a>

                <button type="submit"
                        class="px-6 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition shadow-lg shadow-indigo-600/20">

                    Update Jadwal

                </button>

            </div>

        </form>

    </div>

</div>

@endsection