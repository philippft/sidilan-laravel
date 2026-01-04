@extends('layouts.main-layout')
@section('title', 'PLP dan Laboran Detail Info')

@section('content')

<div class="flex flex-col min-h-screen gap-4 px-2 md:px-0">

    {{-- Tombol back ke daftar --}}
    <a href="{{ route('user.plp-teknisi') }}">
        <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </x-button>
    </a>

    {{-- Container utama card + tombol --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 w-full">

        {{-- Tombol prev desktop --}}
        @if($prevPerson)
        <a href="{{ route('user.plp-teknisi.detailed-info', $prevPerson) }}" class="hidden md:flex md:self-center">
            <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </x-button>
        </a>
        @else
        <div class="hidden md:block h-9 w-9"></div>
        @endif

        {{-- Card + tombol mobile --}}
        <div class="flex flex-col items-center w-full max-w-md">

            <x-profile-photo :value="$detailPerson->photo" size="200"/>

            <div class="bg-white w-fit rounded-3xl font-bold px-3 py-2 border-abu-sidilan border mb-4 mx-auto">
                <h2 class="text-center text-base md:text-xl">{{ $detailPerson->full_name }}</h2>
            </div>

            <x-card-box class="space-y-2 bg-white w-full border border-abu-sidilan font-medium text-base md:text-xl">  
                <div class="my-7 mx-9 space-y-4">
                    <p>NIP: {{ $detailPerson->nip }}</p>
                    <p>Jabatan: {{ $detailPerson->position->name }}</p>
                    <p>Status: {{ $detailPerson->is_active }}</p>
                    <p>Jenis Kelamin: {{ $detailPerson->gender }}</p>
                    <p>Pendidikan: {{ $detailPerson->education->name }}</p>
                </div>           
            </x-card-box>

            {{-- Tombol prev & next mobile --}}
            <div class="flex justify-between w-full mt-4 md:hidden">
                @if($prevPerson)
                <a href="{{ route('user.plp-teknisi.detailed-info', $prevPerson) }}">
                    <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </x-button>
                </a>
                @else
                <div class="h-9 w-9"></div>
                @endif

                @if($nextPerson)
                <a href="{{ route('user.plp-teknisi.detailed-info', $nextPerson) }}">
                    <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </x-button>
                </a>
                @else
                <div class="h-9 w-9"></div>
                @endif
            </div>

        </div>

        {{-- Tombol next desktop --}}
        @if($nextPerson)
        <a href="{{ route('user.plp-teknisi.detailed-info', $nextPerson) }}" class="hidden md:flex md:self-center">
            <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </x-button>
        </a>
        @else
        <div class="hidden md:block h-9 w-9"></div>
        @endif

    </div>
</div>

@endsection
