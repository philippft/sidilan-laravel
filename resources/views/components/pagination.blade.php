@props(['data'])

@if ($data->lastPage() > 1)
<div class="flex mt-6 text-base gap-1 justify-between items-center">
    <p class="text-xl text-black">
        Menampilkan
        <span class="font-medium text-dongker-sidilan">{{ $data->lastItem() }}</span>
        dari
        <span class="font-medium text-dongker-sidilan">{{ $data->total() }}</span>
        entri
    </p>

    {{-- PREV --}}
    <div>
        @if ($data->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 rounded-l-lg cursor-not-allowed">‹</span>
        @else
            <a
                href="{{ $data->previousPageUrl() }}"
                class="px-4 py-2 bg-dongker-sidilan text-white rounded-l-lg"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
        @endif
    
        {{-- PAGE NUMBERS --}}
        @for ($i = 1; $i <= $data->lastPage(); $i++)
            <a
                href="{{ $data->url($i) }}"
                class="px-4 py-2
                       {{ $data->currentPage() === $i ? 'bg-dongker-sidilan text-white font-semibold' : 'bg-white' }}"
            >
                {{ $i }}
            </a>
        @endfor
    
        {{-- NEXT --}}
        @if ($data->hasMorePages())
            <a
                href="{{ $data->nextPageUrl() }}"
                class="px-4 py-2 bg-dongker-sidilan text-white rounded-r-lg"
            >›
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        @else
            <span class="px-4 py-2 bg-gray-300 rounded-r-lg cursor-not-allowed">›</span>
        @endif
    </div>

</div>
@endif

