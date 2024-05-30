@props([
    'id',
    'label',
])

<div class="mb-3">
    <div class="form-check form-switch">
        <input id="{{ $id }}" {{ $attributes->merge(['class' => 'form-check-input']) }} type="checkbox" value="1">
        <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
    </div>
</div>

