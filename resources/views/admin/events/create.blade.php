@extends('layouts.admin')

@section('title','Tambah Event')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">

        <!-- Header -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-slate-900">
                Tambah Event
            </h2>

            <p class="text-slate-500 mt-2">
                Tambahkan event atau kegiatan gereja terbaru.
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('admin.events.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Nama Event -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Event
                    </label>

                    <input type="text"
                           name="nama_event"
                           value="{{ old('nama_event') }}"
                           placeholder="Contoh: Natal Bersama"
                           class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500">

                    @error('nama_event')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- Tanggal -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           value="{{ old('tanggal') }}"
                           class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500">

                    @error('tanggal')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- Lokasi -->
                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Lokasi
                    </label>

                    <input type="text"
                           name="lokasi"
                           value="{{ old('lokasi') }}"
                           placeholder="Contoh: Aula Gereja"
                           class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500">

                    @error('lokasi')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- Upload Banner -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Banner Event
                    </label>

                    <input type="file"
                           name="banner"
                           accept="image/*"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-700
                                  file:mr-4 file:rounded-lg file:border-0
                                  file:bg-brand-600 file:px-4 file:py-2
                                  file:text-sm file:font-semibold
                                  file:text-white hover:file:bg-brand-700">

                    <p class="text-xs text-slate-500 mt-2">
                        Format: JPG, JPEG, PNG (Max 2MB)
                    </p>

                    @error('banner')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="6"
                              placeholder="Masukkan deskripsi event..."
                              class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

            <!-- Action -->
            <div class="flex items-center justify-end gap-4 mt-8">

                <a href="{{ route('admin.events.index') }}"
                   class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold transition">

                    Batal

                </a>

                <button type="submit"
                        class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-semibold transition">

                    Simpan Event

                </button>

            </div>

        </form>

    </div>

</div>

@endsection