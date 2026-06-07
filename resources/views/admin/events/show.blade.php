@extends('layouts.admin')

@section('title', 'Detail Event')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">

        <div class="relative">

            {{-- MENAMPILKAN BANNER FULL (Mendukung path folder lokal publik atau url penuh) --}}
            @if($event->banner && file_exists(public_path('uploads/banner/'.$event->banner)))
                <img src="{{ asset('uploads/banner/'.$event->banner) }}" 
                     alt="{{ $event->nama_event }}" 
                     class="w-full h-[350px] object-cover">
            @elseif($event->banner_url)
                <img src="{{ $event->banner_url }}" 
                     alt="{{ $event->nama_event }}" 
                     class="w-full h-[350px] object-cover">
            @else
                <div class="w-full h-[350px] bg-gradient-to-br from-slate-100 to-slate-200 flex flex-col items-center justify-center text-slate-400 gap-2">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a1 1 0 011.414 0L16 16m-2-2l1.586-1.586a1 1 0 011.414 0L21 14m-7-2a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="text-sm font-medium">Tidak ada gambar banner</span>
                </div>
            @endif

            <div class="absolute top-5 right-5">
                @if($event->is_upcoming)
                    <span class="px-4 py-2 rounded-full bg-green-500 text-white text-sm font-semibold shadow">
                        Upcoming Event
                    </span>
                @else
                    <span class="px-4 py-2 rounded-full bg-slate-700 text-white text-sm font-semibold shadow">
                        Event Selesai
                    </span>
                @endif
            </div>

        </div>

        <div class="p-8">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-slate-900 mb-4">
                    {{ $event->nama_event }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 text-slate-500">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                        </svg>
                        <span class="font-medium">
                            {{ $event->tanggal->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="font-medium">
                            {{ $event->lokasi }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.364 4.56M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="font-medium">
                            {{ $event->user->name ?? 'Administrator' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200 my-8"></div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 mb-4">
                    Deskripsi Event
                </h2>
                <div class="text-slate-600 leading-relaxed whitespace-pre-line">
                    {{ $event->deskripsi }}
                </div>
            </div>

            <div class="flex items-center justify-between mt-10 pt-6 border-t border-slate-200">
                <a href="{{ route('admin.events.index') }}"
                   class="inline-flex items-center px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold transition">
                    ← Kembali
                </a>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.events.edit', $event->id) }}"
                       class="px-5 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-semibold transition">
                        Edit Event
                    </a>

                    {{-- DIUBAH MENGGUNAKAN CLASS JS-DELETE-CONFIRM UNTUK SWEETALERT --}}
                    <form action="{{ route('admin.events.destroy', $event->id) }}" 
                          method="POST" 
                          class="js-delete-confirm">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-5 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection