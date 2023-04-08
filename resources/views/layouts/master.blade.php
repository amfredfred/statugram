<!DOCTYPE html>
<html lang={{str_replace('_', '-', app()->getLocale())}}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Essential META Tags -->
    <meta property="og:title" content="{{config('app.name')}} &bull; Earn Money Without Trading Expertise">
    <meta property="og:type" content="finance" />
    <meta property="og:image" content="{{asset('image/place-holder')}}">
    <meta property="og:url" content="{{\Request::fullUrl()}}">
    <meta name="twitter:card" content="summary_large_image">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:description" content="{{config('app.name').' - '.config('app.description')}}">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta name="twitter:image:alt" content="{{config('app.name')}} &bull; is not a Faucet ❤️">
    <!--  Non-Essential, But Required for Analytics -->
    <meta property="fb:app_id" content="your_app_id" />
    <meta name="twitter:site" content="@statugram">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href={{asset('style/skin.css')}}>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>{{ config('app.name')}} &bull; @yield('title')</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9643693190346556" crossorigin="anonymous"></script>
</head>
<body>
    <main class="app">
        @includeIf('layouts.navigation')
        <div class="content">
            <div class="top-nav-bar">TOP</div>
            @yield('content')
        </div>
    </main>
</body>
</html>
