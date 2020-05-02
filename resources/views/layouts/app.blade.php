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
    <div id="app">
        @include('includes.navbar')
        <section class="section">
            <div class="container">
                <div class="columns">
                    @auth
                    <div class="column is-one-fifth box">

                        @include('includes.menu')

                    </div>
                    @endauth
                    <div class="column">
                        <h1 class="is-size-1 content">@yield('title')</h1>
                        @yield('content')
                    </div>
                </div>
            </div>

        </section>
        <footer class="section"></footer>

    </div>

    <!-- Scripts -->
    <script>
        window.default_locale = "{{ config('app.locale') }}";
        window.fallback_locale = "{{ config('app.fallback_locale') }}";
        window.messages = @json($messages);
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
