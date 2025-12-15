<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => 'font-poppins']) }}>
   {{ $slot }}
</button>
