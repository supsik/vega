<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['extension'])
<x-moonshine::form.input-extensions.ext :extension="$extension" >

{{ $slot ?? "" }}
</x-moonshine::form.input-extensions.ext>