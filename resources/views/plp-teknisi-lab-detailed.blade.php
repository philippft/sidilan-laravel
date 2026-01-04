@extends('layouts.main-layout')
@section('title', 'PLP dan Laboran Detail Info')

@section('content')

<div class="flex flex-col min-h-screen">
    <a href="{{ route('user.plp-teknisi') }}">
        <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </x-button>
    </a>
    <div class="my-auto flex justify-between items-center">
        @if($prevPerson)
        <!-- tombol kembali -->
            <a href="{{ route('user.plp-teknisi.detailed-info', $prevPerson) }}">
                <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </x-button>
            </a>
        @else
            <div class="h-9 w-9"></div>
        @endif
        <div>
            <!-- detail data -->
            <x-profile-photo :value="$detailPerson->photo" size="200"/>
            <div class="bg-white w-fit rounded-3xl font-bold px-3 py-2 border-abu-sidilan border mb-4 mx-auto">
                <h2 class="text-center">{{ $detailPerson->full_name }}</h2>
            </div>
            <x-card-box class="py-6 px-7 space-y-2 bg-white w-120 border border-abu-sidilan font-medium">             
                <p>NIP: {{ $detailPerson->nip }}</p>
                <p>Jabatan: {{ $detailPerson->position->name }}</p>
                <p>Status: {{ $detailPerson->is_active }}</p>
                <p>Jenis Kelamin: {{ $detailPerson->gender }}</p>
                <p>Pendidikan: {{ $detailPerson->education->name }}</p>
            </x-card-box>
        </div>
        @if($nextPerson)
            <!-- tombol berikutnya -->
            <a href="{{ route('user.plp-teknisi.detailed-info', $nextPerson) }}">
                <x-button class="bg-dongker-sidilan p-2 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </x-button>
            </a>
        @else
            <div class="h-9 w-9"></div>
        @endif
    </div>
</div>

@endsection