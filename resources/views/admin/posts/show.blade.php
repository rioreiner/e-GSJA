@extends('layouts.admin')

@section('title','Detail Berita')
@section('page-title','Detail Berita')
@section('breadcrumb','Posts')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600 rounded-3xl p-8 mb-6 text-white shadow-xl">

        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">

            <div>

                <p class="text-indigo-100 text-sm mb-2">
                    Detail Berita Gereja
                </p>

                <h2 class="text-4xl font-extrabold leading-tight">
                    {{ $post->judul }}
                </h2>

                <div class="flex flex-wrap items-center gap-3 mt-4">

                    <span class="px-4 py-1 rounded-full bg-white/20 text-sm font-semibold">
                        {{ $post->author ?? ($post->user->name ?? '-') }}
                    </span>

                    <span class="px-4 py-1 rounded-full bg-white/20 text-sm font-semibold">
                        {{ $post->created_at->format('d M Y') }}
                    </span>

                    @if($post->status == 'published')

                        <span class="px-4 py-1 rounded-full bg-emerald-500 text-sm font-bold">
                            Published
                        </span>

                    @else

                        <span class="px-4 py-1 rounded-full bg-amber-500 text-sm font-bold">
                            Draft
                        </span>

                    @endif

                </div>

            </div>

            <div class="flex items-center gap-3">

                <a href="{{ route('admin.posts.edit', $post->id) }}"
                   class="px-5 py-3 rounded-2xl bg-white text-indigo-700
                          font-bold hover:bg-slate-100 transition">

                    Edit

                </a>

                <a href="{{ route('admin.posts.index') }}"
                   class="px-5 py-3 rounded-2xl bg-white/20 hover:bg-white/30
                          text-white font-bold transition">

                    Kembali

                </a>

            </div>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

        {{-- IMAGE --}}
        @if($post->gambar)

            <img src="{{ $post->gambar_url }}"
                 alt="{{ $post->judul }}"
                 class="w-full h-[450px] object-cover">

        @endif

        {{-- BODY --}}
        <div class="p-8 lg:p-10">

            <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed">

                {!! nl2br(e($post->isi)) !!}

            </div>

        </div>

    </div>

</div>

@endsection