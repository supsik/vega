@props([
    'id',
    'label',
    'isError' => false,
    'errorMessage' => '',
    'required' => false
])

<div class="mb-3">
    <label class="contact-form__label form-label {{ $required ? 'required' : '' }}" for="{{ $id }}">{{ $label }}</label>

    <input
        id="{{ $id }}"
        {{ $attributes->class(['form-control', $isError ? 'is-invalid' : '']) }}
        {{ $attributes }}
    >
    <div class = "error-message"></div>
</div>
