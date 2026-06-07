@extends('layouts.admin')

@section('title','Edit Berita')
@section('page-title','Edit Berita')
@section('breadcrumb','Posts')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500 rounded-3xl p-8 mb-6 text-white shadow-xl">

        <div class="flex items-center gap-4">

            <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center">

                <svg class="w-8 h-8"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M11 5h2m-1 0v14m7-7H5"/>

                </svg>

            </div>

            <div>

                <h2 class="text-3xl font-extrabold">
                    Edit Berita
                </h2>

                <p class="text-orange-100 mt-1">
                    Perbarui berita dan informasi gereja
                </p>

            </div>

        </div>

    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

        <form action="{{ route('admin.posts.update', $post->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="p-8 space-y-6">

                {{-- JUDUL --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           value="{{ old('judul', $post->judul) }}"
                           class="w-full rounded-2xl border border-slate-300 px-5 py-3
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500">

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
                           value="{{ old('author', $post->author) }}"
                           class="w-full rounded-2xl border border-slate-300 px-5 py-3
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500">

                </div>

                {{-- STATUS --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Status
                    </label>

                    <select name="status"
                            class="w-full rounded-2xl border border-slate-300 px-5 py-3">

                        <option value="draft"
                            {{ $post->status == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="published"
                            {{ $post->status == 'published' ? 'selected' : '' }}>
                            Published
                        </option>

                    </select>

                </div>

                {{-- GAMBAR --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-3">
                        Gambar Berita
                    </label>

                    @if($post->gambar)

                        <img src="{{ $post->gambar_url }}"
                             class="w-full md:w-80 rounded-2xl border border-slate-200 mb-4 object-cover">

                    @endif

                    <input type="file"
                           name="gambar"
                           class="w-full rounded-2xl border border-slate-300 px-5 py-3 bg-white">

                </div>

                {{-- ISI --}}
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              rows="12"
                              class="w-full rounded-2xl border border-slate-300 px-5 py-4
                                     focus:ring-2 focus:ring-orange-500 focus:border-orange-500">{{ old('isi', $post->isi) }}</textarea>

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
                        class="px-6 py-3 rounded-2xl bg-orange-600 hover:bg-orange-700
                               text-white font-bold transition shadow-lg shadow-orange-600/20">

                    Update Berita

                </button>

            </div>

        </form>

    </div>

</div>

@endsection