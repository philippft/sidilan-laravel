@props(['active' => false])
<a {{-- class="" --}}
   {{ $attributes->class(['transition duration-150 ease-in-out item-center text-center block ', 'bg-warning hover:bg-warning' => $active]) }}>
   {{ $slot }}
</a>
