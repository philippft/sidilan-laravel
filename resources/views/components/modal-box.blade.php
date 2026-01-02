@props(['id', 'width' => 'max-w-[400px]']) 
{{-- Default width saya set 400px sesuai gambar, tapi bisa di-override --}}

<div id="{{ $id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden transition-opacity duration-300">
    
    <div class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-sm"
         onclick="document.getElementById('{{ $id }}').classList.add('hidden')">
    </div>

    <div class="relative bg-white rounded-xl shadow-2xl {{ $width }} w-full p-6 transform scale-100 transition-transform duration-300 mx-4">
        
        {{ $slot }}

    </div>
</div>