<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    {{-- <div id="app"> --}}
        <nav class="navbar has-shadow">
            <div class="container">
                <div class="navbar-brand">
                    <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                    <div class="navbar-burger burger" data-target="navMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="navbar-menu" id="navMenu">
                    <div class="navbar-start"></div>

                    <div class="navbar-end">
                        @if (Auth::guest())
                        <a class="navbar-item " href="{{ route('login') }}">@lang('trivial.login')</a>
                        {{-- <a class="navbar-item " href="{{ route('register') }}">Register</a> --}}
                        @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                            <div class="navbar-dropdown">
                                <a class="dropdown-item" href="{{ route('admin') }}">@lang('trivial.admin')</a>
                                <a class="navbar-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    @lang('trivial.logout')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <div id="app">
            <section class="section">
                <div class="container">
                    {{-- <div class="columns">

                    <div class="column"> --}}
                    {{-- <h1 class="is-size-1 content">@yield('title')</h1> --}}
                    @yield('content')
                    {{-- </div>
                </div> --}}
                </div>

            </section>
            <footer class="section"></footer>
        </div>
    {{-- </div> --}}

    <!-- Scripts -->


    {{-- @dump($loc ?? '') --}}
    <script>
        // axios.get('/js/localization.js')
        //     .then(response => {
        //         messages = response.data;
        //     });
        window.default_locale = "{{ config('app.locale') }}";
        window.fallback_locale = "{{ config('app.fallback_locale') }}";
        window.messages = @json($messages);

        // console.log($messages);

    </script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>