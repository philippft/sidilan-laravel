@props([
    'name', 
    'title' => 'Sukses', 
    'message' => 'Data Anda Berhasil di Hapus!'
])

<x-modal-confirm name="{{ $name }}">
    
    <div class="text-center font-poppins p-2">
        
        <h2 class="text-3xl font-bold text-gray-900 mb-0">{{ $title }}</h2>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-20 mx-auto text-success">
        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
        </svg>

        
        <p class="text-2xl font-medium text-gray-900 px-4 mb-1">{{ $message }}</p>

        <x-button class="w-full py-3 px-6 bg-dongker-sidilan hover:bg-[#2c4f7c] text-white text-lg font-bold rounded-xl shadow-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1F3A5F]">
            Oke
        </x-button>
        <!-- <div x-data>
            <button 
                type="button"
                @click="$dispatch('close-modal', '{{ $name }}')"
                class="w-full py-3 px-6 bg-dongker-sidilan hover:bg-[#2c4f7c] text-white text-lg font-bold rounded-xl shadow-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1F3A5F]">
                Oke
            </button>
        </div> -->
    </div>
</x-modal-confirm>