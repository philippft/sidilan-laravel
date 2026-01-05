@props(['person'])

<div class="bg-white w-full text-base text-black h-19 rounded-xl shadow-sm border border-gray-100 px-5 py-3 mt-4 flex justify-between items-center hover:shadow-md transition-shadow duration-300">
    <div class="flex items-center justify-between w-full">
        
        {{-- INFO NAMA & JABATAN --}}
        <div class="flex items-center">
            <div class="leading-tight">
                <p class="font-bold text-base text-gray-800">{{ $person->full_name }}</p>
                <p class="text-xs text-gray-500 mt-1">
                    {{-- Menggunakan null coalescing operator (??) jika jabatan kosong --}}
                    {{ $person->position->name ?? 'Belum ada jabatan' }}
                </p>
            </div>
        </div>

        {{-- STATUS BADGE --}}
        {{-- Cek is_active (1 = Aktif, 0 = Tidak Aktif) --}}
        @if($person->is_active == 1)
            <div class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full ml-4 border border-green-200">
                Aktif
            </div>
        @else
            <div class="bg-red-100 text-red-700 text-xs font-bold px-3 py-1 rounded-full ml-4 border border-red-200">
                Tidak Aktif
            </div>
        @endif

    </div>
</div>