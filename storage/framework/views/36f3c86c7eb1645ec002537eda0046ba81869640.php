<div class="header__menu d-flex flex-column">
    <div class="header__sidebar">
        <button class="header__close-btn"></button>

        <div class="navbar-nav">

            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($item->isDropdown()): ?>
                    <li class="header__menu-item nav-item dropdown">
                        <a class="header__menu-btn btn btn-main dropdown-toggle" href="javascript:void(0)" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo e($item->label(), false); ?>

                        </a>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = $item->children(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item" href="<?php echo e($child->link(), false); ?>"><?php echo e($child->label(), false); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>

                <?php else: ?>
                    <a
                        class="header__menu-item header__menu-btn btn btn-main"
                        href="<?php echo e($item->link(), false); ?>"
                    >
                        <?php echo e($item->label(), false); ?>

                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>

    <div class="navbar-nav mt-auto d-lg-none d-block">
        <a
            class="header__menu-item header__menu-btn btn btn-dark"
            href="<?php echo e(route('user.profile.index'), false); ?>"
        >
            Личный кабинет
        </a>
    </div>
</div>
<?php /**PATH /var/www/resources/views/partials/menu.blade.php ENDPATH**/ ?>