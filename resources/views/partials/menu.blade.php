<div class="header__menu d-flex flex-column">
    <div class="header__sidebar">
        <button class="header__close-btn"></button>

        <div class="navbar-nav">

            @foreach($menu as $item)

                @if($item->isDropdown())
                    <li class="header__menu-item nav-item dropdown">
                        <a class="header__menu-btn btn btn-main dropdown-toggle" href="javascript:void(0)" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $item->label() }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($item->children() as $child)
                                <li><a class="dropdown-item" href="{{ $child->link() }}">{{ $child->label() }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                @else
                    <a
                        class="header__menu-item header__menu-btn btn btn-main"
                        href="{{ $item->link() }}"
                    >
                        {{ $item->label() }}
                    </a>
                @endif
            @endforeach

        </div>

    </div>

    <div class="navbar-nav mt-auto d-lg-none d-block">
        <a
            class="header__menu-item header__menu-btn btn btn-dark"
            href="{{ route('user.profile.index') }}"
        >
            Личный кабинет
        </a>
    </div>
</div>
