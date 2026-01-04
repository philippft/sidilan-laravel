<div class="mb-3"
     x-data="{ 
        open: false, 
        isUp: false,
        selected: '{{ old($name, $value) }}',
        options: {{ json_encode($options) }},
        toggle() {
            if (!this.open) {
                let rect = this.$refs.button.getBoundingClientRect();
                let spaceBelow = window.innerHeight - rect.bottom;
                this.isUp = spaceBelow < 300;
            }
            this.open = !this.open;
        },
        get currentLabel() {
            return this.options[this.selected] || '-- Pilih {{ $label }} --';
        }
     }">
    
    <label class="block font-medium md:text-xl text-base md:mb-2 mb-1">{{ $label }}</label>
    
    <div class="relative">
        <input type="hidden" name="{{ $name }}" :value="selected">

        {{-- Tambahkan x-ref='button' --}}
        <div 
            x-ref="button"
            @click="toggle()"
            @click.away="open = false"
            class="w-full md:px-3 px-2 p-2 border bg-white border-gray-300 rounded-md cursor-pointer flex justify-between items-center focus:ring-2 focus:ring-dongker-sidilan transition-all"
            :class="open ? 'ring-2 ring-dongker-sidilan border-transparent' : ''"
        >
            <span x-text="currentLabel" class="md:text-base text-xs" :class="selected === '' ? 'text-gray-400' : 'text-black'"></span>
            <svg class="md:size-5 size-3 transition-transform" :class="open ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>

        {{-- Bagian Dropdown dengan posisi dinamis --}}
        <div 
            x-show="open" 
            x-transition
            {{-- Jika isUp true, gunakan bottom-full (muncul di atas). Jika false, gunakan top-full (muncul di bawah) --}}
            :class="isUp ? 'bottom-full mb-2' : 'top-full mt-2'"
            class="absolute z-[9999] w-full bg-white border border-gray-200 rounded-xl shadow-2xl overflow-y-auto max-h-60"
            style="display: none;"
        >
            <template x-for="(display, val) in options" :key="val">
                <div 
                    @click="selected = val; open = false"
                    class="md:px-4 px-2 md:py-3 py-1.5 text-xs cursor-pointer hover:bg-hover-sidilan hover:text-white transition-colors"
                    :class="selected == val ? 'bg-blue-50 md:font-bold text-xs font-medium text-dongker-sidilan' : ''"
                    x-text="display"
                ></div>
            </template>
        </div>
    </div>
</div>