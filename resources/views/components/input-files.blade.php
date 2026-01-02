@props(['id', 'name', 'label' => 'Pilih File', 'value' => null])

<div class="flex flex-col items-center justify-center space-y-4" 
     x-data="{ 
        {{-- Jika ada value (path foto), tampilkan. Jika tidak, kosongkan --}}
        imageUrl: '{{ $value ? asset('storage/person_images/' . $value) : '' }}',
        
        fileChosen(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = e => this.imageUrl = e.target.result;
        }
     }">
    
    <div class="w-40 h-40 bg-gray-200 rounded-3xl overflow-hidden flex items-center justify-center shadow-inner border-2 border-dashed border-gray-300">
        {{-- Tampilkan Gambar jika imageUrl ada --}}
        <template x-if="imageUrl">
            <img :src="imageUrl" class="w-full h-full object-cover">
        </template>
        
        {{-- Tampilkan Icon Placeholder jika imageUrl kosong --}}
        <template x-if="!imageUrl">
            <div class="text-center p-4">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="mt-1 text-xs text-gray-500">Belum ada foto</p>
            </div>
        </template>
    </div>

    <label for="{{ $id }}" class="cursor-pointer w-full bg-[#FBB03B] hover:bg-[#e5a035] text-center text-2xl text-white font-bold py-4 px-10 rounded-md transition-all shadow-md active:scale-95">
        {{ $label }}
    </label>

    {{-- <input 
        type="file" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        class="hidden" 
        accept="image/*"
        @change="fileChosen"
    > --}}

    <input class="hidden" id="{{ $id }}" name="{{ $name }}" type="file" accept="image/*" @change="fileChosen">
</div>