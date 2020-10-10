<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <title>@yield('app-title')</title>
</head>
<body>
<header class="header">
    <h1 class="header__title">@yield('page-title')</h1>

    <nav class="header__navigation">
        <ul class="header__navigation-list">
            <li class="header__navigation-item">
                <a href="/">Головна</a>
            </li>

            <li class="header__navigation-item">
                <a href="/about">Про проект</a>
            </li>

            <li class="header__navigation-item">
                <a href="/product-list">Список товарів</a>
            </li>
        </ul>
    </nav>
</header>

<main>
    @yield('page-content')
</main>

</body>
</html>
