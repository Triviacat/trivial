@extends('layouts.app')

@section('content')

<div class="columns is-marginless is-centered">
    <div class="column is-5">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">@lang('auth.login')</p>
            </header>
            <div class="card-content">
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.email')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input @error('email') is-danger @enderror" id="email_login" type="email"
                                        name="email" value="{{ old('email') }}" required>
                                </p>
                                @error('email')
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.password')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input @error('password') is-danger @enderror" id="password_login"
                                        type="password" name="password" required autocomplete="current-password">
                                </p>
                                @error('password'))
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label"></div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>@lang('auth.rememberMe')
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label"></div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-primary">@lang('auth.loginButton')</button>
                                </div>
                                @if (Route::has('password.request'))
                                <div class="control">
                                    <a href="{{ route('password.request') }}">
                                        @lang('auth.passwordForgot')
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="column is-5">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">@lang('auth.register')</p>
            </header>
            <div class="card-content">
                <form class="register-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.name')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input" id="name" type="name" name="register_name"
                                        value="{{ old('register_name') }}" required>
                                </p>
                                @error('register_name')
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.email')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input @error('register_email') is-danger @enderror" id="email_register" type="email" name="register_email"
                                        value="{{ old('register_email') }}" required>
                                </p>
                                @error('register_email')
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.emailConfirm')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input @error('register_email') is-danger @enderror" id="email_confirmation" type="email" name="register_email_confirmation"
                                        required>
                                </p>
                                @error('register_email')
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.password')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input @error('register_password') is-danger @enderror" id="password_register" type="password" name="register_password"
                                        required>
                                </p>
                                @error('register_password')
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.passwordConfirm')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input @error('register_password') is-danger @enderror" id="password-confirm" type="password"
                                        name="register_password_confirmation" required>
                                </p>
                                @error('register_password')
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label"></div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-primary">@lang('auth.registerButton')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
