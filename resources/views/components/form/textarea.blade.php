@props([
    'label',
    'isError' => false,
    'errorMessage' => '',
])

@php($id = uniqid('form'))

<div class="mb-3">
    <label class="contact-form__label form-label required" for="{{ $id }}">{{ $label }}</label>

    <textarea
        id="{{ $id }}"
        {{ $attributes->class(['form-control', $isError ? 'is-invalid' : '']) }}
        {{ $attributes }}
    ></textarea>

    @if($isError)
        <div class="invalid-feedback">
            {{ $errorMessage }}
        </div>
    @endif
</div>
