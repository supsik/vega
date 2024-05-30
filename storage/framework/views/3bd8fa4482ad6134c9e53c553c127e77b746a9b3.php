<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
    <meta name="yandex-verification" content="d019676dba73ff26" />

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico'), false); ?>">
    <?php if($_SERVER['REQUEST_URI'] === '/news'): ?>
    <link rel="canonical" href="<?php echo e(url()->current(), false); ?>" /> 
    <?php endif; ?>
    <script src="//code.jivo.ru/widget/AejXOG8qfy" async></script>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/scss/app.scss', 'resources/js/app.js']); ?>
</head>

<body>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('flash', [])->html();
} elseif ($_instance->childHasBeenRendered('N0WRnLE')) {
    $componentId = $_instance->getRenderedChildComponentId('N0WRnLE');
    $componentTag = $_instance->getRenderedChildComponentTagName('N0WRnLE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('N0WRnLE');
} else {
    $response = \Livewire\Livewire::mount('flash', []);
    $html = $response->html();
    $_instance->logRenderedChild('N0WRnLE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<div class="bg-overlay"></div>
<div class="wrapper" itemscope itemtype="https://schema.org/MedicalClinic">
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<?php echo \Livewire\Livewire::scripts(); ?>


<?php if(app()->isProduction()): ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(95133373, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/95133373" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php endif; ?>
<script src="https://unpkg.com/@rive-app/canvas@2.7.0"></script>
<?php echo $__env->yieldPushContent('js'); ?>
</body>

</html>
<?php /**PATH /var/www/resources/views/layouts/main.blade.php ENDPATH**/ ?>