<!DOCTYPE html>
<html lang={{str_replace('_', '-', app()->getLocale())}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href={{asset('style/skin.css')}}>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>{{ config('app.name')}} &bull; @yield('title')</title>
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