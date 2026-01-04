<div
    x-show="showModal"
    x-cloak
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm"
>
    <div
        {{ $attributes->merge([
            'class' => 'bg-white rounded-xl shadow-xl max-w-[400px] w-full h-fit p-6 z-10'
        ]) }}
        x-transition.scale
    >
        <h2 class="text-lg font-semibold mb-4 text-center">
            Konfirmasi Hapus
        </h2>

        <div class="flex justify-center items-center mb-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="size-20 text-kuning-sidilan">
                <path fill-rule="evenodd"
                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                    clip-rule="evenodd" />
            </svg>
        </div>

        <p class="text-center mb-1">Yakin ingin menghapus data</p>
        <p class="text-center font-semibold mb-6 wrap-break-words">
            <span x-text="dataPerson"></span>?
        </p>

        <div class="flex gap-4">
            <x-button
                type="button"
                @click="showModal = false"
                class="w-1/2 px-2 py-3 rounded-md bg-danger text-white"
            >
                Batal
            </x-button>

            <form
                class="w-1/2" :action="deleteUrl" method="POST">
                @csrf
                @method('DELETE')

                <x-button
                    @click="
                        showModal = false;
                        showConfirm = true"
                    type="submit"
                    class="w-full px-2 py-3 rounded-md bg-success text-white"
                >
                    Yakin
                </x-button>
            </form>
        </div>
    </div> 
    {{-- <x-success-modal /> --}}
</div>
