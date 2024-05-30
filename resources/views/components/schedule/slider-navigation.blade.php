@props(['id'])

<div class="schedule-carousel__controls">
    <button
        class="carousel-btn carousel-btn--prev schedule-carousel__prev-btn"
        type="button"
        data-bs-target="#{{ $id }}"
        data-bs-slide="prev"
    ></button>
    <button
        class="carousel-btn schedule-carousel__next-btn"
        type="button"
        data-bs-target="#{{ $id }}"
        data-bs-slide="next"
    ></button>
</div>
