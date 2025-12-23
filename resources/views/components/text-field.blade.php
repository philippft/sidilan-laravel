@props(['id', 'label', 'name', 'type' => 'text'])

<div>
   <label for="{{ $id }}" class="font-medium text-xl">
      {{ $label }}
   </label>
   @if ($type == 'textarea')
      <textarea name="{{ $name }}" id="{{ $id }}"
         {{ $attributes->merge(['class' => 'mt-2 w-full px-3 py-2 border bg-white border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent']) }}>
         {{ $slot }}
      </textarea>
   @endif
      <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
      {{ $attributes->merge(['class' => 'mt-2 w-full px-3 py-2 border bg-white border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent']) }}>
</div>
