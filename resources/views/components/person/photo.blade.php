@props([
    'url',
    'name',
])

<img
    class="person__photo img-fluid"
    src="{{ $url }}"
    alt="{{ $name }}"
>
