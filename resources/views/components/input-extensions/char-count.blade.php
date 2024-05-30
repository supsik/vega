@props(['extension'])
<div class="expansion flex bg-green-500" type="button">
    <span x-bind:class="charCount < maxCount ? 'text-green-600' : 'text-pink-600'"  x-text="charCount"></span> / <span class="text-pink-600" x-text="maxCount"></span>
</div>


