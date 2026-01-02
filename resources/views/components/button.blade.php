<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => 'cursor-pointer']) }}>
   {{ $slot }}
</button>
