<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous"
    >

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <title>@yield('app-title')</title>
</head>
<body>
<header class="header">
    <h1 class="header__title">@yield('page-title')</h1>

    <nav class="header__navigation" role="navigation">
        <ul class="header__navigation-list">
            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/">Home</a>
            </li>

            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/about">About</a>
            </li>

            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/product">Shop</a>
            </li>

            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/product/create">Create</a>
            </li>
        </ul>
    </nav>
</header>

<main>
    @yield('page-content')
</main>

</body>
</html>
