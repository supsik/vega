<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['extension'])
<x-input-extensions.char-count :extension="$extension" >

{{ $slot ?? "" }}
</x-input-extensions.char-count>