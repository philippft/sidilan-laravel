@props(['id', 'label', 'name', 'value' => null,'placeholder', 'type' => 'text'])

<div class="mb-2">
   <label for="{{ $id }}" class="font-medium text-xl mb-2 block">
      {{ $label }}
   </label>
   @if ($type == 'textarea')
      <textarea value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $id }}"
         {{ $attributes->merge(['class' => 'w-full px-3 py-2 border bg-white border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:ring-inset focus:border-transparent']) }}>
         {{ $slot }}
      </textarea>
      @else
      <input value="{{ old($name, $value) }}" type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
      {{ $attributes->merge(['class' => 'w-full px-3 py-3 border bg-white border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-dongker-sidilan focus:ring-inset focus:border-transparent']) }}>
    @endif
</div>
