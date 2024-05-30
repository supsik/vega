<nav class="user-menu">
    <div class="user-menu__list nav nav-tabs" id="nav-tab">
        <a class="user-menu__item nav-link {{ active_link('user.profile.index') }}"
           href="{{ route('user.profile.index') }}">Личный кабинет</a>
        <a class="user-menu__item nav-link {{ active_link(['user.appointment.index', 'user.appointment.show']) }}"
           href="{{ route('user.appointment.index') }}">Запись
            на прием</a>
        <a class="user-menu__item nav-link {{ active_link(['user.conclusions.index', 'user.conclusions.show']) }}"
           href="{{ route('user.conclusions.index') }}">Заключения</a>
        <a class="user-menu__item nav-link {{ active_link(['user.analysis.index', 'user.analysis.show']) }}"
           href="{{ route('user.analysis.index') }}">Анализы</a>
    </div>

    <form class="user-menu__logout" action="{{ route('user.logout') }}">
        <button type="submit" class="btn btn-outline-danger">Выйти</button>
    </form>
</nav>
