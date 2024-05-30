<nav class="user-menu">
    <div class="user-menu__list nav nav-tabs" id="nav-tab">
        <a class="user-menu__item nav-link <?php echo e(active_link('user.profile.index'), false); ?>"
           href="<?php echo e(route('user.profile.index'), false); ?>">Личный кабинет</a>
        <a class="user-menu__item nav-link <?php echo e(active_link(['user.appointment.index', 'user.appointment.show']), false); ?>"
           href="<?php echo e(route('user.appointment.index'), false); ?>">Запись
            на прием</a>
        <a class="user-menu__item nav-link <?php echo e(active_link(['user.conclusions.index', 'user.conclusions.show']), false); ?>"
           href="<?php echo e(route('user.conclusions.index'), false); ?>">Заключения</a>
        <a class="user-menu__item nav-link <?php echo e(active_link(['user.analysis.index', 'user.analysis.show']), false); ?>"
           href="<?php echo e(route('user.analysis.index'), false); ?>">Анализы</a>
    </div>

    <form class="user-menu__logout" action="<?php echo e(route('user.logout'), false); ?>">
        <button type="submit" class="btn btn-outline-danger">Выйти</button>
    </form>
</nav>
<?php /**PATH /var/www/resources/views/user/partials/menu.blade.php ENDPATH**/ ?>