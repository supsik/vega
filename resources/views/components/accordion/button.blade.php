<button {{ $attributes->merge(['class' => 'accordion-button']) }}
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#flush-collapseOne" aria-expanded="false"
        aria-controls="flush-collapseOne">{{ $slot }}</button>
