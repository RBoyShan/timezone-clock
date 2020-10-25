@extends('layout')

@section('app-title', 'Login')

@section('page-title', 'Login')

@section('page-content')
    <div class="container">
        <form class="form create-form" method="post" action="{{ route('login') }}">
            @csrf

            <div class="create-form__group">
                <label class="label create-form__label" for="email">
                    {{ __('E-Mail Address') }}
                </label>

                <input class="input create-form__control @error('email') input--error @enderror"
                       type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       autocomplete="email"
                       required
                />

                @include('includes.errors.auth-form-error', ['target' => 'email' ])
            </div>

            <div class="create-form__group">
                <label class="label create-form__label" for="password">
                    {{ __('Password') }}
                </label>

                <input class="input create-form__control @error('password') input--error @enderror"
                       type="password"
                       name="password"
                       id="password"
                       autocomplete="current-password"
                       required
                />

                @include('includes.errors.auth-form-error', ['target' => 'password' ])
            </div>

            <div class="create-form__group">
                <div class="create-form__check">
                    <input class="input create-form__control checkbox"
                           type="checkbox"
                           name="remember"
                           id="remember"
                           {{ old('remember') ? 'checked' : '' }}
                    />

                    <label class="create-form__check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <button class="button button--submit create-form__submit" type="submit">
                {{ __('Login') }}
            </button>

            @if(Route::has('password.request'))
                <a class="button button--link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
@endsection
