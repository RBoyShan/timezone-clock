<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous"
    >

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <title>@yield('app-title')</title>
</head>
<body>
<header class="header">
    <nav class="header__navigation" role="navigation">
        <ul class="header__navigation-list">
            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/">{{ __('Home') }}</a>
            </li>

            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/about">{{ __('About') }}</a>
            </li>

            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/collection/0/product">{{ __('Products') }}</a>
            </li>

            <li class="header__navigation-item">
                <a class="header__navigation-link" href="/collections">{{ __('Collections') }}</a>
            </li>

            @can('admin-panel')
                <li class="header__navigation-item">
                    <a class="header__navigation-link" href="/admin">{{ __('Admin') }}</a>
                </li>
            @endcan

            @guest
                <li class="header__navigation-item">
                    <a class="header__navigation-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

               @if(Route::has('register'))
                    <li class="header__navigation-item">
                        <a class="header__navigation-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    </li>
               @endif
            @else
                <li class="header__navigation-item">
                    <a id="navbarDropdown"
                       class="header__navigation-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"
                       v-pre
                    >
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                        >
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form"
                              action="{{ route('logout') }}"
                              method="POST"
                              class="form form--hidden"
                        >
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
</header>

<main class="content">
    <div class="page-banner">
        <img
            class="page-banner__image"
            src="{{ asset('images/general/about_hero.png') }}"
            alt="banner"
        />

        <p class="page-banner__title">
            @yield('page-title')
        </p>
    </div>

    @yield('page-content')
</main>

<footer class="footer">
    <div class="container">
        <div class="footer__links-wrapper">
            <div class="footer__links">
                <p class="footer__links-title">{{ __('Quick links') }}</p>

                <a class="footer__link" href="/">{{ __('Home') }}</a>

                <a class="footer__link" href="/about">{{ __('About') }}</a>

                <a class="footer__link" href="/collection/0/product">{{ __('Products') }}</a>

                <a class="footer__link" href="/collections">{{ __('Collections') }}</a>
            </div>

            <div class="footer__links">
                <p class="footer__links-title">{{ __('New Products') }}</p>

                @foreach(\App\Product::all()->sortByDesc('created_at')->take(4) as $product)
                    <a class="footer__link" href="collection/0/product/{{ $product->id }}">{{ $product->name }}</a>
                @endforeach
            </div>

            <div class="footer__links">
                <p class="footer__links-title">{{ __('New Collections') }}</p>

                @foreach(\App\Collection::all()->sortByDesc('created_at')->take(4) as $collection)
                    <a class="footer__link" href="collection/{{ $collection->id }}/product">{{ $collection->name }}</a>
                @endforeach
            </div>
        </div>

        <div class="footer__copyright">
            <span class="footer__copyright-content">
                Copyright © {{ date('Y') }} by BoyShan
            </span>
        </div>
    </div>
</footer>
</body>
</html>
