@props(['active' => false])
<a {{-- class="" --}}
   {{ $attributes->class(['transition duration-150 ease-in-out item-center text-black block bg-[#e0e0e0] rounded-full lg:px-6 md:py-3 md:px-4 md:text-xs lg:text-base px-3 py-2 text-[10px] text-center font-medium hover:bg-abu-sidilan/90', 'bg-warning hover:bg-warning' => $active]) }}>
   {{ $slot }}
</a>
