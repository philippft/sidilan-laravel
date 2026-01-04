@props(['id', 'label' => '', 'name', 'value' => null, 'placeholder' => '', 'type' => 'text'])

<div class="lg:mb-3 mb-1.5">
   <label for="{{ $id }}" class="font-medium md:text-xl text-base md:mb-2 mb-1 block">
      {{ $label }}
   </label>
   @if ($type == 'textarea')
      <textarea value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" name="{{ $name }}"
         id="{{ $id }}"
         {{ $attributes->merge(['class' => 'md:text-base text-xs w-full md:px-3 px-2 md:py-2 py-1.5 border bg-white border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black focus:ring-inset focus:border-transparent']) }}>
         {{ $slot }}
      </textarea>
   @else
      <input value="{{ old($name, $value) }}" type="{{ $type }}" name="{{ $name }}"
         id="{{ $id }}" placeholder="{{ $placeholder }}"
         {{ $attributes->merge(['class' => 'md:text-base text-xs w-full md:px-3 px-2 py-2 border bg-white border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-dongker-sidilan focus:ring-inset focus:border-transparent']) }}>
   @endif
</div>
