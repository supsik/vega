<div {{ $attributes->merge(['class' => 'schedule-carousel__wrapper carousel slide']) }} data-bs-ride="carousel">
    <div class="carousel-inner">
        {{ $slot }}
    </div>
</div>
