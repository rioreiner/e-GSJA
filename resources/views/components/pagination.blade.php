@if ($paginator->hasPages())

<div class="flex items-center justify-between mt-6">

    {{-- Mobile --}}
    <div class="flex flex-1 justify-between sm:hidden">

        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-sm text-slate-400 bg-slate-100 rounded-lg">
                Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="px-4 py-2 text-sm text-white bg-brand-600 rounded-lg hover:bg-brand-700 transition">
                Previous
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="ml-3 px-4 py-2 text-sm text-white bg-brand-600 rounded-lg hover:bg-brand-700 transition">
                Next
            </a>
        @else
            <span class="ml-3 px-4 py-2 text-sm text-slate-400 bg-slate-100 rounded-lg">
                Next
            </span>
        @endif

    </div>

    {{-- Desktop --}}
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">

        <div>
            <p class="text-sm text-slate-500">
                Menampilkan
                <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                sampai
                <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                dari
                <span class="font-semibold">{{ $paginator->total() }}</span>
                data
            </p>
        </div>

        <div class="flex items-center gap-1">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())

                <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 text-slate-400">
                    ‹
                </span>

            @else

                <a href="{{ $paginator->previousPageUrl() }}"
                   class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 hover:bg-brand-50 hover:border-brand-300 transition">
                    ‹
                </a>

            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)

                @if (is_string($element))

                    <span class="px-3 py-2 text-slate-400">
                        {{ $element }}
                    </span>

                @endif

                @if (is_array($element))

                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())

                            <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-brand-600 text-white font-semibold">
                                {{ $page }}
                            </span>

                        @else

                            <a href="{{ $url }}"
                               class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white hover:bg-brand-50 hover:border-brand-300 transition">
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach

                @endif

            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())

                <a href="{{ $paginator->nextPageUrl() }}"
                   class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 hover:bg-brand-50 hover:border-brand-300 transition">
                    ›
                </a>

            @else

                <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 text-slate-400">
                    ›
                </span>

            @endif

        </div>

    </div>

</div>

@endif