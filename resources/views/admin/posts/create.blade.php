@extends('layouts.admin')

@section('title','Tambah Berita')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600 rounded-3xl p-8 mb-6 text-white shadow-xl">

        <div class="flex items-center gap-4">

            <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center">

                <svg class="w-8 h-8"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M19 11H5m14-7H5m14 14H5"/>
                </svg>

            </div>

            <div>

                <h2 class="text-3xl font-extrabold">
                    Tambah Berita Gereja
                </h2>

                <p class="text-indigo-100 mt-1">
                    Tambahkan informasi dan berita terbaru gereja
                </p>

            </div>

        </div>

    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

        <form action="{{ route('admin.posts.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="p-8 space-y-6">

                {{-- JUDUL --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           value="{{ old('judul') }}"
                           placeholder="Masukkan judul berita..."
                           class="w-full rounded-2xl border border-slate-300 px-5 py-3
                                  focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    @error('judul')
                        <p class="text-rose-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- AUTHOR --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Penulis
                    </label>

                    <input type="text"
                           name="author"
                           value="{{ old('author') }}"
                           placeholder="Nama penulis..."
                           class="w-full rounded-2xl border border-slate-300 px-5 py-3
                                  focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    @error('author')
                        <p class="text-rose-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- GAMBAR --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Gambar Berita
                    </label>

                    <input type="file"
                           name="gambar"
                           class="w-full rounded-2xl border border-slate-300 px-5 py-3 bg-white">

                    @error('gambar')
                        <p class="text-rose-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- STATUS --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Status
                    </label>

                    <select name="status"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-3
                                   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                        <option value="draft">
                            Draft
                        </option>

                        <option value="published">
                            Published
                        </option>

                    </select>

                    @error('status')
                        <p class="text-rose-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- ISI --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              rows="12"
                              placeholder="Tulis isi berita..."
                              class="w-full rounded-2xl border border-slate-300 px-5 py-4
                                     focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('isi') }}</textarea>

                    @error('isi')
                        <p class="text-rose-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="px-8 py-6 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">

                <a href="{{ route('admin.posts.index') }}"
                   class="px-5 py-3 rounded-2xl bg-slate-200 hover:bg-slate-300
                          text-slate-700 font-semibold transition">

                    Batal

                </a>

                <button type="submit"
                        class="px-6 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700
                               text-white font-bold transition shadow-lg shadow-indigo-600/20">

                    Simpan Berita

                </button>

            </div>

        </form>

    </div>

</div>

@endsection