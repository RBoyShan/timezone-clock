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
    <script src="{{ asset('js/main.js') }}"></script>

    <title>@yield('app-title')</title>
</head>
<body>
<header class="header">
    <h1 class="header__title">@yield('page-title')</h1>

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

<main>
    @yield('page-content')
</main>

</body>
</html>
