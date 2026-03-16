<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => 'cursor-pointer block']) }}>
   {{ $slot }}
</button>
