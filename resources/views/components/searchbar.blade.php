<div
    x-data="{
        keyword: '{{ request('search') }}',
        search() {
            fetch(`{{ url()->current() }}?search=${this.keyword}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('search-result').innerHTML = html
            })
        }
    }"
    class="flex gap-5"
>
    <div class="relative">
        <input
            type="text"
            x-model="keyword"
            placeholder="{{ $placeholder ?? 'Ketik di sini..' }}"
            @keydown.enter.prevent="search"
            class="w-130 h-13 px-4 py-2 rounded-xl border-2 border-abu-sidilan outline-none
                   focus:border-0 focus:ring-2 focus:ring-dongker-sidilan"
        >
    </div>

    <div>
        <button
            type="button"
            @click="search"
            class="bg-dongker-sidilan text-white h-13 px-6 py-2 rounded-xl
                   focus:outline-none focus:ring-1 focus:ring-abu-sidilan"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
    </div>
</div>
