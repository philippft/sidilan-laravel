@props(['name', 'width' => 'max-w-[500px]'])

<div
    x-data="{ show: false }"
    x-show="show"
    @keydown.escape.window="show = false"
    @open-modal.window="if ($event.detail === '{{ $name }}') show = true"
    @close-modal.window="if ($event.detail === '{{ $name }}') show = false"
    style="display: none;" x-cloak 
    class="fixed inset-0 z-50 flex items-center justify-center transition-opacity duration-300"
>
    
    <div 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="show = false"
        class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-sm"
    ></div>

    <div 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="relative bg-white rounded-xl shadow-2xl {{ $width }} w-full p-6 mx-4 z-10"
    >
        {{ $slot }}
    </div>
</div>