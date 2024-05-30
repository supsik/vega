@props([
    'type' => 'dark',
])

<div class="alert alert-{{ $type }}" role="alert">
    {{ $slot }}
</div>
