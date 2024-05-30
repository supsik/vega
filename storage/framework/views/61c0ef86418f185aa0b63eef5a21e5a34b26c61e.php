
<nav class="breadcrumb">
    <ol class="breadcrumb__list">
        <li class="breadcrumb__item">
            <a class="breadcrumb__link" href="<?php echo e(route('home'), false); ?>">Главная</a>
            <span class="breadcrumb__slash">/</span>
        </li>

        <?php echo e($slot, false); ?>


    </ol>
</nav>
<?php /**PATH /var/www/resources/views/components/breadcrumbs/index.blade.php ENDPATH**/ ?>