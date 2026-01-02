@props([
    'name',           // Nama input (wajib, misal: 'foto', 'ktp')
    'label',          // Label teks (wajib)
    'preview' => null // URL foto lama (opsional, untuk edit)
])

<div x-data="{
        imageUrl: @js($preview), // Mengambil data prop preview dengan aman

        fileChosen(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.imageUrl = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        removeImage() {
            this.imageUrl = null;
            this.$refs.input.value = ''; // Reset input file menggunakan $refs
        }
    }" 
    class="w-full mb-6">

    <label class="block text-sm font-bold text-gray-700 mb-2">
        {{ $slot }}
    </label>

    <div class="relative w-full h-64">
        
        <div x-show="!imageUrl" 
             @click="$refs.input.click()"
             class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300">
            
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span></p>
                <p class="text-xs text-gray-500">PNG, JPG (Max. 2MB)</p>
            </div>
        </div>

        <div x-show="imageUrl" style="display: none;" class="relative w-full h-full rounded-lg overflow-hidden group">
            <img :src="imageUrl" class="w-full h-full object-cover" alt="Preview">
            
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                <button type="button" 
                        @click="removeImage()" 
                        class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-600 shadow-lg transition transform hover:scale-105">
                    Hapus / Ganti
                </button>
            </div>
        </div>
    </div>

    <input x-ref="input"
           id="{{ $name }}"
           name="{{ $name }}" 
           type="file" 
           class="hidden" 
           accept="image/*"
           @change="fileChosen($event)">

    @error($name)
        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>