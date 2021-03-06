@extends('layouts.app')

@section('content')
<div class="columns is-marginless is-centered">
    <div class="column is-5">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">@lang('auth.passwordReset')</p>
            </header>
            <div class="card-content">
                @if (session('status'))
                <div class="notification">
                    {{ session('status') }}
                </div>
                @endif
                <form class="forgot-password-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">@lang('auth.email')</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input @error('email') is-danger @enderror" id="email" type="email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </p>
                                @error('email')
                                <p class="help is-danger">
                                    <strong>{{ $message }}</strong>
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
                                    <button type="submit" class="button is-primary">@lang('auth.passwordResetButton')
                                    </button>
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
