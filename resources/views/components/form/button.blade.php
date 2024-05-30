@props([
    'color' => 'main',
])



<div class="mb-3">
    <button {{ $attributes->class(["contact-form__submit btn btn-{$color}"]) }}>
        {{ $slot }}
    </button>
</div>
