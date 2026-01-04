@props(['person' => null])

<div class="flex gap-4 lg:justify-start justify-center items-center">
   <label for="is_active" class="lg:text-xl text-base font-medium block cursor-pointer">
      Status:
   </label>

   <input 
      id="is_active"
      class="lg:size-6 size-4 text-dongker-sidilan" 
      type="checkbox" 
      name="is_active" 
      value="1"
      {{-- Mengecek old input atau data dari database --}}
      {{ old('is_active', $person?->is_active ?? false) ? 'checked' : '' }}
   >
</div>