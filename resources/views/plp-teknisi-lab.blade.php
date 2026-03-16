@extends('layouts.main-layout')
@section('title', 'PLP dan Teknisi Lab')

@section('content')

{{-- @dd($plpTeknisiLab) --}}
<div class="flex flex-col md:flex-row justify-between">
    <div>
        <h1 class="text-2xl font-bold">Data PLP dan Teknisi Lab</h1>
        <form method="GET" class="mt-3 flex items-center gap-2 font-medium text-sm text-black">
            <label for="per_page">Tampilkan</label>
            <select name="per_page" id="per_page" onchange="this.form.submit()" class="border px-1 py-0.5 focus:outline-none">
               @foreach ([2, 10, 25, 50] as $size)
                  <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                     {{ $size }}
                  </option>
               @endforeach
            </select>
            <span>entri</span>
        </form>
    </div>
    <x-search-bar/>
</div>

   {{-- LIST --}}
   @if ($plpTeknisiLab->count())
      @foreach ($plpTeknisiLab as $item)
         <div
            class="bg-white w-full text-base text-black h-19 rounded-xl shadow-lg px-5 py-3 mt-4 flex justify-between items-center">
            <div class="flex items-center justify-between w-full">
               <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-8 flex items-center mr-3">
                     <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                  </svg>
                  <div class="leading-tight">
                     <p class="font-bold text-base">{{ $item->full_name }}</p>
                     <p class="text-sm mt-1"> {{ $item->position->name ?? '-' }}</p>
                  </div>
               </div>
               {{-- eee ini aku ada tambahin a biar bisa href, ini buat test controller aja, bisa di ganti nnati -philip --}}
               <a href="{{ route('user.plp-teknisi.detailed-info', $item) }}">
                  <x-button>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                           d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                     </svg>
                  </x-button>
               </a>

            </div>
         </div>
      @endforeach
   @else
      <p class="mt-8 text-center">
         Data PLP dan Teknisi Lab tidak ditemukan
      </p>
   @endif

   {{-- PAGINATION --}}
   <x-pagination :data="$plpTeknisiLab" />

@endsection
