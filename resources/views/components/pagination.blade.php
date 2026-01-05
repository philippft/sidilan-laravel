@props(['data'])

@if ($data->lastPage() > 1)
   {{-- Perubahan utama: flex-col untuk mobile, sm:flex-row untuk desktop --}}
   <div class="flex flex-col lg:flex-row  lg:mt-6 mt-4 gap-4 justify-end lg:justify-between items-center">

      {{-- Teks Info: Akan berada di atas saat mobile karena flex-col --}}
      <p class="text-sm md:text-base lg:text-xl text-right lg:text-left w-full text-black">
         Menampilkan
         <span class="font-medium text-dongker-sidilan">{{ $data->lastItem() }}</span>
         dari
         <span class="font-medium text-dongker-sidilan">{{ $data->total() }}</span>
         entri
      </p>

      {{-- Navigasi: Akan berada di bawah teks info saat mobile --}}
      <div class="flex justify-end w-full items-center">
         {{-- PREV --}}
         @if ($data->onFirstPage())
            <span
               class="md:px-4 px-3 md:py-2 py-1.5 bg-gray-300 text-white rounded-l-lg cursor-not-allowed flex items-center">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                  stroke="currentColor" class="size-4 md:size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
               </svg>
            </span>
         @else
            <a href="{{ $data->previousPageUrl() }}"
               class="md:px-4 px-3 md:py-2 py-1.5 bg-dongker-sidilan text-white rounded-l-lg flex items-center hover:opacity-90">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                  stroke="currentColor" class="size-4 md:size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
               </svg>
            </a>
         @endif

         {{-- PAGE NUMBERS --}}
         <div class="flex">
            @for ($i = 1; $i <= $data->lastPage(); $i++)
               <a href="{{ $data->url($i) }}"
                  class="md:px-4 px-3 md:py-2 py-1.5 border-y border-gray-200 text-xs md:text-base font-semibold
                           {{ $data->currentPage() === $i ? 'bg-dongker-sidilan text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                  {{ $i }}
               </a>
            @endfor
         </div>

         {{-- NEXT --}}
         @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}"
               class="md:px-4 px-3 md:py-2 py-1.5 bg-dongker-sidilan text-white rounded-r-lg flex items-center hover:opacity-90">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                  stroke="currentColor" class="size-4 md:size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
               </svg>
            </a>
         @else
            <span
               class="md:px-4 px-3 md:py-2 py-1.5 bg-gray-300 text-white rounded-r-lg cursor-not-allowed flex items-center">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                  stroke="currentColor" class="size-4 md:size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
               </svg>
            </span>
         @endif
      </div>
   </div>
@endif
