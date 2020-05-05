<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:description" content="El trivial en línia, obert, col·laboratiu i en català." />
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:image" content="{{ asset('assets/images/Trivial.png') }}" />

    <meta name="twitter:card" content="photo" />
    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta name="twitter:site" content="@garrigos_robert" />
    <meta name="twitter:description" content="El trivial en línia, obert, col·laboratiu i en català." />
    <meta name="twitter:site" content="{{ env('APP_URL') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <section class="hero is-primary is-medium">
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>
                            <span class="navbar-burger burger" data-target="navMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div id="navMenu" class="navbar-menu">
                            <div class="navbar-start"></div>
                            <div class="navbar-end">
                                <a class="navbar-item" href="/games">Jugar</a>
                                <a class="navbar-item"
                                    href="{{ env('TRIVIACAT_DOCS_URL') }}">@lang('trivial.instructions')&nbsp;<i
                                        class="fas fa-external-link-alt"></i></a>

                                <a class="navbar-item"
                                    href="{{ env('TRIVIACAT_PREGUNTES_URL') }}">@lang('trivial.questions')&nbsp;<i
                                        class="fas fa-external-link-alt"></i></a>

                                <span class="navbar-item">
                                    <a class="button is-white is-outlined" href="https://github.com/Triviacat/web">
                                        <span class="icon">
                                            <i class="fab fa-github"></i>
                                        </span>
                                        <span title="Hello from the other side">Codi font</span>
                                    </a>
                                </span>
                            </div>
                        </div>
                </nav>
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        TriviaCat, el trivial en català.
                    </h1>
                    <h2 class="subtitle">
                        Jugueu al trivial en català en línia amb TriviaCat, el trivial obert i col·laboratiu.
                    </h2>
                </div>
            </div>
        </section>
        <div class="box cta">
            <p class="has-text-centered">
                <span class="tag is-primary">Novetat!</span> Ja podeu <a href="/beta">provar la versió Beta</a> del joc
                en línia.
            </p>
        </div>
        @if (session('message'))
        <div class="notification  is-warning has-text-centered">
            {{ session('message') }}
        </div>
        @endif
        <section class="container">

            @if (!isset(Auth()->user()->email_verified_at) && null !== (Auth()->user()))
            <div class="notification  is-warning has-text-centered">Us hem enviat un correu de verificació amb un enllaç
                per finalitzar el procés de registre.</div>
            @endif
            <div class="columns features">
                <div class="column is-4">
                    <div class="card is-shady">
                        <div class="card-content">
                            <div class="content">
                                <h4>Instruccions</h4>
                                <p>Seguiu aquestes simples instruccions per jugar al trivial amb les vostres amistats
                                    amb TriviaCat.</p>
                                <p><a href="{{ env('TRIVIACAT_DOCS_URL') }}">Consulteu les instruccions</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card is-shady">
                        <div class="card-content">
                            <div class="content">
                                <h4>Jugar</h4>
                                <p>Jugueu al trívial en Català en línia amb les vostres amistats.</p>
                                <p><a href="/games">Comenceu a jugar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card is-shady">
                        <div class="card-content">
                            <div class="content">
                                <h4>Col·laborar</h4>
                                <p>TriviaCat és un projecte obert i col·aboratiu. Podeu aportar les vostres pròpies <a
                                        href="{{ env('TRIVIACAT_PREGUNTES_URL') }}">preguntes i respostes</a>. També
                                    podeu
                                    col·laborar en el desenvolupament i millora del codi que trobareu a <a
                                        href="https://github.com/Triviacat/web">Github</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <div class="control level-item">
                        <a href="https://github.com/Triviacat/web">
                            <div class="tags has-addons">
                                <span class="tag is-dark">TriviaCat</span>
                                <span class="tag is-primary">MIT license</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
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
