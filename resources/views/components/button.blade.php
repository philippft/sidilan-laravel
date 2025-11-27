<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class'=>'w-full px-3 py-2 bg-dongker-sidilan rounded-md'])}}>
    {{ $slot }}
</button> 