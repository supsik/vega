<?php if(isset($services)): ?>
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a class="mobile-serch__item" href="<?php echo e(route('appointment.index', ['serviceId' => $service->id]), false); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M7.22222 13.4444C10.6587 13.4444 13.4444 10.6587 13.4444 7.22222C13.4444 3.78578 10.6587 1 7.22222 1C3.78578 1 1 3.78578 1 7.22222C1 10.6587 3.78578 13.4444 7.22222 13.4444Z" stroke="#ACB5BB" stroke-width="1.05" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.0005 14.9998L11.6172 11.6165" stroke="#ACB5BB" stroke-width="1.05" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p class="mobile-serch__helper-text"><?php echo e($service->title, false); ?></p>
        <span class="mobile-serch__category"></span>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($doctors)): ?>
    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a class="mobile-serch__item" href="<?php echo e(route('doctors.show', $doctor), false); ?>">
        <img src="<?php echo e($doctor->getFirstMediaUrl('photo'), false); ?>" alt="person">
        <p class="mobile-serch__helper-text"><?php echo e($doctor->fullName, false); ?></p>
        <span class="mobile-serch__category"><?php echo e($doctor->specialities_json[0], false); ?></span>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($diagnostics)): ?>
    <?php $__currentLoopData = $diagnostics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a class="mobile-serch__item" href="/diagnostics/<?php echo e($diagnostic->slug, false); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
            <path d="M4.44434 3.44739C4.44434 3.00071 4.63164 2.57233 4.96504 2.25648C5.29843 1.94063 5.75062 1.76318 6.22211 1.76318H13.3332C13.8047 1.76318 14.2569 1.94063 14.5903 2.25648C14.9237 2.57233 15.111 3.00071 15.111 3.44739V10.1842C15.111 10.6309 14.9237 11.0593 14.5903 11.3752C14.2569 11.691 13.8047 11.8684 13.3332 11.8684H6.22211C5.75062 11.8684 5.29843 11.691 4.96504 11.3752C4.63164 11.0593 4.44434 10.6309 4.44434 10.1842V3.44739Z" stroke="#ACB5BB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M0.888672 6.8158C0.888672 6.36912 1.07597 5.94074 1.40937 5.62489C1.74277 5.30904 2.19495 5.13159 2.66645 5.13159H9.77756C10.2491 5.13159 10.7012 5.30904 11.0346 5.62489C11.368 5.94074 11.5553 6.36912 11.5553 6.8158V13.5526C11.5553 13.9993 11.368 14.4277 11.0346 14.7436C10.7012 15.0594 10.2491 15.2369 9.77756 15.2369H2.66645C2.19495 15.2369 1.74277 15.0594 1.40937 14.7436C1.07597 14.4277 0.888672 13.9993 0.888672 13.5526V6.8158Z" stroke="#ACB5BB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p class="mobile-serch__helper-text"><?php echo e($diagnostic->name, false); ?></p>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/resources/views/partials/search-menu.blade.php ENDPATH**/ ?>