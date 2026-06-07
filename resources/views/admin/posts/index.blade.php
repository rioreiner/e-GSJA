@extends('layouts.admin')

@section('title','Berita Gereja')
@section('page-title','Berita Gereja')
@section('breadcrumb','Posts')

@section('content')

{{-- HEADER --}}
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">

    <div>

        <h2 class="text-3xl font-extrabold text-slate-900">
            Berita Gereja
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Kelola berita, pengumuman, dan informasi gereja
        </p>

    </div>

    <a href="{{ route('admin.posts.create') }}"
       class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl
              bg-gradient-to-r from-indigo-600 to-violet-600
              hover:from-indigo-700 hover:to-violet-700
              text-white text-sm font-bold transition shadow-lg shadow-indigo-600/20">

        <svg class="w-5 h-5"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 4v16m8-8H4"/>

        </svg>

        Tambah Berita

    </a>

</div>

{{-- STATISTIC --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

    {{-- TOTAL --}}
    <div class="bg-white rounded-3xl border border-slate-200 p-6">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Berita
                </p>

                <h3 class="text-3xl font-extrabold text-slate-900 mt-2">
                    {{ $posts->total() }}
                </h3>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center">

                <svg class="w-7 h-7 text-indigo-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M19 11H5m14-7H5m14 14H5"/>

                </svg>

            </div>

        </div>

    </div>

    {{-- PUBLISHED --}}
    <div class="bg-white rounded-3xl border border-slate-200 p-6">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Published
                </p>

                <h3 class="text-3xl font-extrabold text-emerald-600 mt-2">
                    {{ $posts->where('status','published')->count() }}
                </h3>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center">

                <svg class="w-7 h-7 text-emerald-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>

                </svg>

            </div>

        </div>

    </div>

    {{-- DRAFT --}}
    <div class="bg-gradient-to-r from-violet-600 to-indigo-600 rounded-3xl p-6 text-white">

        <p class="text-sm text-indigo-100">
            Draft Berita
        </p>

        <h3 class="text-3xl font-extrabold mt-2">
            {{ $posts->where('status','draft')->count() }}
        </h3>

        <p class="text-xs text-indigo-100 mt-2">
            Berita belum dipublish
        </p>

    </div>

</div>

{{-- TABLE --}}
<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">

    {{-- TABLE HEADER --}}
    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">

        <div>

            <h3 class="text-xl font-bold text-slate-800">
                Data Berita
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Semua berita dan informasi gereja
            </p>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-xs font-bold uppercase text-slate-500">
                        Berita
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold uppercase text-slate-500">
                        Penulis
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold uppercase text-slate-500">
                        Status
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold uppercase text-slate-500">
                        Tanggal
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-bold uppercase text-slate-500">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse($posts as $post)

                <tr class="hover:bg-slate-50 transition">

                    {{-- BERITA --}}
                    <td class="px-6 py-5">

                        <div class="flex items-start gap-4">

                            {{-- GAMBAR --}}
                            <img src="{{ $post->gambar_url }}"
                                 alt="{{ $post->judul }}"
                                 class="w-20 h-20 rounded-2xl object-cover border border-slate-200">

                            {{-- CONTENT --}}
                            <div>

                                <h4 class="font-bold text-slate-800 text-base">
                                    {{ $post->judul }}
                                </h4>

                                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                                    {{ Str::limit(strip_tags($post->isi), 90) }}
                                </p>

                            </div>

                        </div>

                    </td>

                    {{-- PENULIS --}}
                    <td class="px-6 py-5 text-sm text-slate-600">

                        {{ $post->author ?? ($post->user->name ?? '-') }}

                    </td>

                    {{-- STATUS --}}
                    <td class="px-6 py-5">

                        @if($post->status == 'published')

                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">
                                Published
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold">
                                Draft
                            </span>

                        @endif

                    </td>

                    {{-- TANGGAL --}}
                    <td class="px-6 py-5 text-sm text-slate-600">

                        {{ $post->created_at->format('d M Y') }}

                    </td>

                    {{-- AKSI --}}
                    <td class="px-6 py-5">

                        <div class="flex items-center justify-center gap-2">

                            {{-- DETAIL --}}
                            <a href="{{ route('admin.posts.show', $post->id) }}"
                               class="px-3 py-2 rounded-xl bg-blue-100 hover:bg-blue-200
                                      text-blue-700 text-xs font-bold transition">

                                Detail

                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                               class="px-3 py-2 rounded-xl bg-amber-100 hover:bg-amber-200
                                      text-amber-700 text-xs font-bold transition">

                                Edit

                            </a>

                            {{-- Delete Form (SweetAlert Terintegrasi via class js-delete-confirm) --}}
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" 
                                  method="POST" 
                                  class="inline-block js-delete-confirm">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-semibold hover:bg-rose-200 transition">
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="px-6 py-12 text-center text-slate-400">

                        Belum ada berita tersedia

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- PAGINATION --}}
<div class="mt-6">

    {{ $posts->links() }}

</div>

@endsection