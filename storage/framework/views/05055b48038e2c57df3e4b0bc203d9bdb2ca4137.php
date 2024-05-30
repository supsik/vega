<meta charset="utf-8" />
<title><?php echo $__env->yieldContent('title', config("moonshine.title")); ?></title>
<meta name="description" content="<?php echo e(config("moonshine.title"), false); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('vendor/moonshine/apple-touch-icon.png'), false); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('vendor/moonshine/favicon-32x32.png'), false); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('vendor/moonshine/favicon-16x16.png'), false); ?>">
<link rel="manifest" href="<?php echo e(asset('vendor/moonshine/site.webmanifest'), false); ?>">
<link rel="mask-icon" href="<?php echo e(asset('vendor/moonshine/safari-pinned-tab.svg'), false); ?>" color="#7843E9">
<meta name="msapplication-TileColor" content="#7843E9">
<meta name="theme-color" content="#7843E9">

<?php echo e(\Illuminate\Support\Facades\Vite::useHotFile(storage_path('moonshine.hot'))
        ->useBuildDirectory('vendor/moonshine')
        ->withEntryPoints(['resources/js/app.js']), false); ?>

<?php /**PATH /var/www/vendor/moonshine/moonshine/resources/views/layouts/shared/head.blade.php ENDPATH**/ ?>