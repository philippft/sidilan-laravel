
<div
    x-data="{
        search: '{{ request('search') }}',
        submit() {
            const params = new URLSearchParams(window.location.search)
            this.search
                ? params.set('search', this.search)
                : params.delete('search')

            window.location.search = params.toString()
        }
    }"
    class="flex gap-5"
>
    <input
        type="text"
        x-model="search"
        @keydown.enter.prevent="submit"
        placeholder="Ketik di sini.."
        {{ $attributes->merge(['class' => "w-130 lg:h-13 h-9 lg:px-4 px-2 lg:py-2 py-1 lg:text-base text-xs rounded-xl border-2 border-abu-sidilan focus:border-0 focus:ring-inset focus:outline-none focus:ring-2 focus:ring-dongker-sidilan"])}}
    >

    <x-button
        type="button"
        @click="submit"
        class="bg-dongker-sidilan text-white lg:h-13 h-9 lg:px-6 px-3 lg:py-2 py-1 rounded-xl focus:outline-none focus:ring-1 focus:ring-abu-sidilan"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:size-6 size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </x-button>
</div>