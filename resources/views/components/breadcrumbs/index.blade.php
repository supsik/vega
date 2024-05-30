
<nav class="breadcrumb">
    <ol class="breadcrumb__list">
        <li class="breadcrumb__item">
            <a class="breadcrumb__link" href="{{ route('home') }}">Главная</a>
            <span class="breadcrumb__slash">/</span>
        </li>

        {{ $slot }}

    </ol>
</nav>
