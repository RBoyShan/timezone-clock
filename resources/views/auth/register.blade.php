@extends('layout')

@section('app-title', 'Sign Up')

@section('page-title', 'Sign Up')

@section('page-content')
    <div class="container">
        <form class="form create-form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="create-form__group">
                <label class="label create-form__label" for="name">
                    {{ __('Name') }}
                </label>

                <input class="input create-form__control @error('name') input--error @enderror"
                       type="text"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       autocomplete="name"
                       autofocus
                       required
                />

                @include('includes.errors.auth-form-error', ['target' => 'name' ])
            </div>

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
                       autocomplete="new-password"
                       required
                />

                @include('includes.errors.auth-form-error', ['target' => 'password' ])
            </div>

            <div class="create-form__group">
                <label class="label create-form__label" for="password_confirmation">
                    {{ __('Confirm Password') }}
                </label>

                <input class="input create-form__control"
                       type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       autocomplete="new-password"
                       required
                />
            </div>

            <button class="button button--submit create-form__submit" type="submit">Sign Up</button>
        </form>
    </div>
@endsection
