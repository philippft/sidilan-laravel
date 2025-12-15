<input type="{{ $type ?? 'text' }}" {{ $attributes->merge(['class'=>'w-full px-3 py-2 border bg-white border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent'])}}>
    {{ $slot }}
</input> 