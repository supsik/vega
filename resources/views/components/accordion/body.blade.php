<div {{ $attributes->merge(['class' => 'accordion-collapse collapse']) }} id="flush-collapseOne"
     aria-labelledby="flush-headingOne"
     data-bs-parent="#accordionFlushExample"
>
    <div class="accordion-body appointment-page__scroll">
        {{ $slot }}
    </div>
</div>
