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
        class="w-130 h-13 px-4 py-2 rounded-xl border-2 border-abu-sidilan focus:border-0 focus:outline-none focus:ring-2 focus:ring-dongker-sidilan"
    >

    <x-button
        type="button"
        @click="submit"
        class="bg-dongker-sidilan text-white h-13 px-6 py-2 rounded-xl focus:outline-none focus:ring-1 focus:ring-abu-sidilan"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </x-button>
</div>