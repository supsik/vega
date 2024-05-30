@props([
    'id',
    'fields' => [],
    'label',
    'value',
    'isError' => false,
    'errorMessage' => '',
    'required' => false,
])


<div class="mb-3">
    <label class="contact-form__label form-label {{ $required ? 'required' : '' }}" for="{{ $id }}">{{ $label }}</label>

    <select id="{{ $id }}" {{ $attributes->class(['form-select', 'is-invalid' => $isError]) }}>
        <option value="" selected>Не выбрано</option>

        @foreach($fields as $optionName => $optionValue)
            <option value="{{ $optionValue }}" @selected($optionValue === $value)>{{ $optionName }}</option>
        @endforeach
    </select>

    @if($isError)
        <div class="invalid-feedback">
            {{ $errorMessage }}
        </div>
    @endif
</div>
