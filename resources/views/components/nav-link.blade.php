@props(['active' => false])
<a {{-- class="" --}}
   {{ $attributes->class(['transition duration-150 ease-in-out item-center text-black block bg-[#e0e0e0] rounded-full px-6 py-3 font-medium hover:bg-abu-sidilan/90', 'bg-warning hover:bg-warning' => $active]) }}>
   {{ $slot }}
</a>
