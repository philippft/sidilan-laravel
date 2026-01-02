@props(['person'])
<div class="flex gap-4 items-center">
   <label id="is_active" class="text-xl font-medium block">
      Status:
   </label>
   <input class="size-6 text-dongker-sidilan" type="checkbox" name="is_active" value="1"
      {{ $person ? 'checked' : '' }}>
</div>
