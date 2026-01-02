<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playground Component</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex flex-col items-center justify-center gap-5">

    <h1 class="text-2xl font-bold text-slate-700">Test Area Komponen</h1>

    <button onclick="document.getElementById('testModal').classList.remove('hidden')" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition">
        Coba Munculkan Pop Up
    </button>

    <x-modal-box id="testModal">
        
        <div class="text-center font-poppins">
            <h2 class="text-xl font-bold text-dongker-sidilan mb-0">Konfirmasi Hapus</h2>
            
            <div class="flex justify-center mb-0">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-20 text-kuning-sidilan">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                    </svg>

                </div>
            </div>

            <div class="mb-2">
                <p class="text-xl text-[#1E1E1E]">Anda yakin?</p>
                <p class="text-xl text-[#1E1E1E]">Ingin menghapus data ini</p>
            </div>

            
            <div class="flex gap-4">
                <x-button id=""
                        onclick="document.getElementById('testModal').classList.add('hidden')" 
                        class="w-full py-2.5 bg-danger hover:bg-red-600 text-white font-semibold rounded-lg shadow-md transition">
                    Batal
                </x-button>
                
                <x-button id=""
                        class="w-full py-2.5 bg-success hover:bg-green-600 text-white font-semibold rounded-lg shadow-md transition">
                    Yakin
                </x-button>
            </div>
            
        </div>
        </x-modal-box>

</body>
</html>