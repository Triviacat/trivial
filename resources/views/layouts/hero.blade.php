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
    {{-- <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon"> --}}
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> --}}
    <!-- Bulma Version 0.8.x-->
    {{-- <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.0/css/bulma.min.css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="../css/hero.css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://unpkg.com/bulma-modal-fx/dist/css/modal-fx.min.css" /> --}}
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
                                <a class="navbar-item" href="{{ env('TRIVIACAT_DOCS_URL') }}">@lang('trivial.instructions')&nbsp;<i class="fas fa-external-link-alt"></i></a>

                                <a class="navbar-item" href="{{ env('TRIVIACAT_PREGUNTES_URL') }}">@lang('trivial.questions')&nbsp;<i class="fas fa-external-link-alt"></i></a>

                                <span class="navbar-item">
                                    <a class="button is-white is-outlined"
                                        href="https://github.com/Triviacat/web">
                                        <span class="icon">
                                            <i class="fab fa-github"></i>
                                        </span>
                                        <span title="Hello from the other side">Codi font</span>
                                    </a>
                                </span>
                                {{-- @if (Auth::guest())
                                        <a class="navbar-item " href="{{ route('login') }}">@lang('trivial.login')</a>
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
                                @endif --}}


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
                <span class="tag is-primary">Novetat!</span> Ja podeu provar la versió Beta del joc en línia.
            </p>
        </div>



        <section class="container">
            {{-- @dump(Auth()->user()); --}}
            @if (!isset(Auth()->user()->email_verified_at) && null !== (Auth()->user()))
                <div class="notification  is-warning has-text-centered">Us hem enviat un correu de verificació amb un enllaç per finalitzar el procés de registre.</div>
            @endif
            <div class="columns features">
                <div class="column is-4">
                    <div class="card is-shady">
                        {{-- <div class="card-image has-text-centered">
                            <i class="fas fa-paw"></i>
                        </div> --}}
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
                        {{-- <div class="card-image has-text-centered">
                            <i class="fab fa-empire"></i>
                        </div> --}}
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
                        {{-- <div class="card-image has-text-centered">
                            <i class="fab fa-apple"></i>
                        </div> --}}
                        <div class="card-content">
                            <div class="content">
                                <h4>Col·laborar</h4>
                                <p>TriviaCat és un projecte obert i col·aboratiu. Podeu aportar les vostres pròpies <a
                                        href="{{ env('TRIVIACAT_PREGUNTES_URL') }}">preguntes i respostes</a>. També podeu
                                    col·laborar en el desenvolupament i millora del codi que trobareu a <a
                                        href="https://github.com/Triviacat/web">Github</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="intro column is-8 is-offset-2">
            <h2 class="title">Perfect for developers or designers!</h2><br>
            <p class="subtitle">Vel fringilla est ullamcorper eget nulla facilisi. Nulla facilisi nullam vehicula ipsum
                a. Neque egestas congue quisque egestas diam in arcu cursus.</p>
        </div> --}}
            {{-- <div class="sandbox">
            <div class="tile is-ancestor">
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Hello World</p>
                        <p class="subtitle">What is up?</p>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Foo</p>
                        <p class="subtitle">Bar</p>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Third column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child notification is-white">
                                <p class="title">Vertical tiles</p>
                                <p class="subtitle">Top box</p>
                            </article>
                            <article class="tile is-child notification is-white">
                                <p class="title">Vertical tiles</p>
                                <p class="subtitle">Bottom box</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-white">
                                <p class="title">Middle box</p>
                                <p class="subtitle">With an image</p>
                                <figure class="image is-4by3">
                                    <img src="https://picsum.photos/640/480/?random" alt="Description">
                                </figure>
                            </article>
                        </div>
                    </div>
                    <div class="tile is-parent is-shady">
                        <article class="tile is-child notification is-white">
                            <p class="title">Wide column</p>
                            <p class="subtitle">Aligned with the right column</p>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                    pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                    feugiat facilisis.</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <div class="content">
                            <p class="title">Tall column</p>
                            <p class="subtitle">With even more content</p>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat
                                    pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat
                                    gravida libero rhoncus ut. Morbi maximus, leo sit amet vehicula
                                    eleifend, nunc dui porta orci, quis semper odio felis ut quam.</p>
                                <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a
                                    sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor
                                    lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet
                                    felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam,
                                    finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>
                                <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue
                                    lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed,
                                    gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam
                                    ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Side column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
                <div class="tile is-parent is-8 is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Main column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent is-8 is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Murphy's law</p>
                        <p class="subtitle">Anything that can go wrong will go wrong</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Main column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat facilisis.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div> --}}
        </section>
        <footer class="footer">
            <div class="container">
                {{-- <div class="columns">
                <div class="column is-3 is-offset-2">
                    <h2><strong>Category</strong></h2>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Vestibulum errato isse</a></li>
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Aisia caisia</a></li>
                        <li><a href="#">Murphy's law</a></li>
                        <li><a href="#">Flimsy Lavenrock</a></li>
                        <li><a href="#">Maven Mousie Lavender</a></li>
                    </ul>
                </div>
                <div class="column is-3">
                    <h2><strong>Category</strong></h2>
                    <ul>
                        <li><a href="#">Labore et dolore magna aliqua</a></li>
                        <li><a href="#">Kanban airis sum eschelor</a></li>
                        <li><a href="#">Modular modern free</a></li>
                        <li><a href="#">The king of clubs</a></li>
                        <li><a href="#">The Discovery Dissipation</a></li>
                        <li><a href="#">Course Correction</a></li>
                        <li><a href="#">Better Angels</a></li>
                    </ul>
                </div>
                <div class="column is-4">
                    <h2><strong>Category</strong></h2>
                    <ul>
                        <li><a href="#">Objects in space</a></li>
                        <li><a href="#">Playing cards with coyote</a></li>
                        <li><a href="#">Goodbye Yellow Brick Road</a></li>
                        <li><a href="#">The Garden of Forking Paths</a></li>
                        <li><a href="#">Future Shock</a></li>
                    </ul>
                </div>
            </div> --}}
                <div class="content has-text-centered">
                    {{-- <p>
                    <a class="icon" href="https://github.com/Triviacat/web">
                        <i class="fab fa-github"></i>
                    </a>
                </p> --}}
                    <div class="control level-item">
                        <a href="https://github.com/Triviacat/web">
                            <div class="tags has-addons">
                                <span class="tag is-dark">TriviCat</span>
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
