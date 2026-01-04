@props(['animasi' => 'transition-all duration-300 hover:-translate-y-2 hover:shadow-xl'])

<div {{-- class="shadow-md" --}} {{ $attributes->merge(['class' => 'py-4 px-5 shadow-lg rounded-2xl ' . $animasi]) }}>
   {{ $slot }}
</div>
