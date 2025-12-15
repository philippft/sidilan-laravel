<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => '']) }}>
   {{ $slot }}
</button>
