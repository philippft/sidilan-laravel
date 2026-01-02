<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Modal Laravel Vite</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center gap-5 font-sans antialiased">

    <div x-data class="flex gap-4">
        <button 
            @click="$dispatch('open-modal', 'modalHapus')"
            class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg shadow">
            1. Coba Modal Konfirmasi
        </button>

        <button 
            @click="$dispatch('open-modal', 'modalSukses')"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow">
            2. Coba Modal Sukses
        </button>
    </div>


    <x-modal-confirm name="modalHapus">
       </x-modal-confirm>


    <x-success-modal name="modalSukses" />
        

    </body>

</html>