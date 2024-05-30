<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="yandex-verification" content="d019676dba73ff26" />

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    @if ($_SERVER['REQUEST_URI'] === '/news')
    <link rel="canonical" href="{{ url()->current() }}" /> 
    @endif
    <script src="//code.jivo.ru/widget/AejXOG8qfy" async></script>
    @livewireStyles
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>

<livewire:flash/>

<div class="bg-overlay"></div>
<div class="wrapper" itemscope itemtype="https://schema.org/MedicalClinic">
    @include('partials.header')
    <main class="main">
        @yield('content')
    </main>
    @include('partials.footer')
</div>


@livewireScripts

@if(app()->isProduction())

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

@endif
<script src="https://unpkg.com/@rive-app/canvas@2.7.0"></script>
@stack('js')
</body>

</html>
