@extends('layouts.admin')

@section('title','Event Gereja')
@section('page-title','Event Gereja')
@section('breadcrumb','Events')

@section('content')

<div class="flex items-center justify-between mb-6">

    <div>

        <h2 class="text-2xl font-bold text-slate-900">
            Event Gereja
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Kelola event dan kegiatan gereja
        </p>

    </div>

    <a href="{{ route('admin.events.create') }}"
       class="px-5 py-3 rounded-xl bg-brand-600 hover:bg-brand-700
              text-white text-sm font-semibold transition">

        Tambah Event

    </a>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

    @forelse($events as $event)

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        <div class="p-5">

            <div class="flex items-start justify-between mb-4">

                <div>

                    <h3 class="text-lg font-bold text-slate-800">
                        {{ $event->nama_event }}
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        {{ $event->tanggal->format('d M Y') }}
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-brand-100 flex items-center justify-center">

                    <svg class="w-6 h-6 text-brand-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10"/>

                    </svg>

                </div>

            </div>

            <p class="text-sm text-slate-600 mb-4">
                {{ Str::limit($event->deskripsi, 120) }}
            </p>

            <div class="text-sm text-slate-500 mb-5">
                📍 {{ $event->lokasi }}
            </div>

            <div class="flex items-center gap-2">

                <a href="{{ route('admin.events.show',$event->id) }}"
                   class="flex-1 text-center px-4 py-2 rounded-xl bg-blue-100 text-blue-700 text-sm font-semibold">
                    Detail
                </a>

                <a href="{{ route('admin.events.edit',$event->id) }}"
                   class="flex-1 text-center px-4 py-2 rounded-xl bg-amber-100 text-amber-700 text-sm font-semibold">
                    Edit
                </a>

            </div>

        </div>

    </div>

    @empty

    <div class="col-span-full bg-white rounded-2xl border border-slate-200 p-10 text-center text-slate-400">

        Belum ada event tersedia

    </div>

    @endforelse

</div>

<div class="mt-5">
    {{ $events->links() }}
</div>

@endsection