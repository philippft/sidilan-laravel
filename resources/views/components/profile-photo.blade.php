@props([
    'value' => null,     
    'size' => '200'       
])

@php
    $photoUrl = $value
        ? asset('storage/person_images/' . $value)
        : null;
@endphp

<div class="flex justify-center mb-5">
    <div class="size-{{ $size }} bg-gray-200 rounded-full overflow-hidden flex items-center justify-center shadow-inner border border-kuning-sidilan">
        @if($photoUrl)
            <img src="{{ $photoUrl }}" class="w-full h-full object-cover">
        @else
            <div class="text-center size-25 md:size-50 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-25 md:size-50">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
        @endif
    </div>
</div>
