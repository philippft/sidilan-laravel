<div {{-- class=""  --}}
   {{ $attributes->merge(['class' => 'py-4 px-5 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl shadow-lg rounded-2xl']) }}>
   {{ $slot }}
</div>
