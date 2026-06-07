@extends('layouts.admin')

@section('title','Edit Event')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">

        <!-- Header -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-slate-900">
                Edit Event
            </h2>

            <p class="text-slate-500 mt-2">
                Perbarui informasi event gereja.
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('admin.events.update', $event->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Nama Event -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Event
                    </label>

                    <input type="text"
                           name="nama_event"
                           value="{{ old('nama_event', $event->nama_event) }}"
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
                           value="{{ old('tanggal', $event->tanggal->format('Y-m-d')) }}"
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
                           value="{{ old('lokasi', $event->lokasi) }}"
                           placeholder="Contoh: Aula Gereja"
                           class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500">

                    @error('lokasi')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- Banner Lama -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-slate-700 mb-3">
                        Banner Saat Ini
                    </label>

                    <img
                        src="{{ $event->banner_url }}"
                        alt="{{ $event->nama_event }}"
                        class="w-full md:w-96 h-56 object-cover rounded-2xl border border-slate-200"
                    >

                </div>

                <!-- Upload Banner Baru -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Ganti Banner
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
                        Kosongkan jika tidak ingin mengganti banner.
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
                              class="w-full rounded-xl border-slate-300 focus:border-brand-500 focus:ring-brand-500">{{ old('deskripsi', $event->deskripsi) }}</textarea>

                    @error('deskripsi')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

            <!-- Action -->
            <div class="flex items-center justify-between mt-8">

                <a href="{{ route('admin.events.index') }}"
                   class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold transition">

                    ← Kembali

                </a>

                <div class="flex items-center gap-3">

                    <a href="{{ route('admin.events.show', $event->id) }}"
                       class="px-5 py-3 rounded-xl bg-slate-600 hover:bg-slate-700 text-white font-semibold transition">

                        Detail Event

                    </a>

                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-semibold transition">

                        Update Event

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection