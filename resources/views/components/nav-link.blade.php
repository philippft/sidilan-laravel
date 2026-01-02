@props(['active' => false, 'activeClass' => 'bg-warning hover:bg-warning'])
<a {{-- class="" --}}
   {{ $attributes->class(['block transition duration-150 ease-in-out item-center text-center font-medium', "$activeClass" => $active]) }}>
   {{ $slot }}
</a>
