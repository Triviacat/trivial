{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-7">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Dashboard
                        </p>
                    </header>

                    <div class="card-content">
                        You are logged in!
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection --}}


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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
    <title>TriviaCat</title>
    {{-- <link rel="shortcut icon" href="/assets/images/fav_icon.png" type="image/x-icon"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.8.x-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.0/css/bulma.min.css" />

    <style>
        html,body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}
.hero.is-info {
  background: linear-gradient(
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.5)
    ), url('/assets/images/Trivial.png') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.hero .nav, .hero.is-success .nav {
  -webkit-box-shadow: none;
  box-shadow: none;
}
.hero .subtitle {
  padding: 3rem 0;
  line-height: 1.5;
}
    </style>
</head>

<body>
    <section class="hero is-info is-fullheight">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="../">
                            TriviaCat
                        </a>
                        <span class="navbar-burger burger" data-target="navbarMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenu" class="navbar-menu">
                        <div class="navbar-end">
                            {{-- <span class="navbar-item">
                                <a class="button is-white is-outlined" href="#">
                                    <span class="icon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                    <span>Home</span>
                                </a>
                            </span> --}}
                            {{-- <span class="navbar-item">
                                <a class="button is-white is-outlined" href="#">
                                    <span class="icon">
                                        <i class="fa fa-superpowers"></i>
                                    </span>
                                    <span>Examples</span>
                                </a>
                            </span> --}}
                            <span class="navbar-item">
                                <a class="button is-white is-outlined" href="https://preguntes.triviacat.site">
                                    <span class="icon">
                                        <i class="fa fa-book"></i>
                                    </span>
                                    <span>Preguntes</span>
                                </a>
                            </span>
                            <span class="navbar-item">
                                <a class="button is-white is-outlined" href="https://github.com/Triviacat/web">
                                    <span class="icon">
                                        <i class="fa fa-github"></i>
                                    </span>
                                    <span>Codi font</span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
            </div>

            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-6 is-offset-3">
                        <h1 class="title">
                            Properament
                        </h1>
                        <h2 class="subtitle">
                            Estem treballant en una versió del trivial en català per poder jugar confinats, davant un ordinador, connectats amb les nostres amistats en un video xat de mòbil, per donar-li un major realisme.<br><br>
                            Tot de codi obert i gratuït, naturalment<br><br>
                            <a href="https://preguntes.triviacat.site" >Voleu col·laborar tot afegint preguntes? <i class="fa fa-external-link"></i></a>
                        </h2>
                        {{-- <div class="box">
                        <p><a href="https://preguntes.triviacat.site" class="button">Voleu col·laborar tot afegint preguntes?</a></p>
                        </div> --}}
                        <div class="box">
                            <form action="/notify" method="post">
                                @csrf
                                <div class="content"><p>Deixeu-nos un correu si voleu participar de periode de proves que obrirem aviat.</p></div>
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <input class="input" name="email" type="email" placeholder="Enter your email">

                                </p>
                                <p class="control">
                                    <button class="button is-info" type="submit">
                                        Aviseu-me
                                    </button>
                                </p>
                            </div>
                        </form>
                        </div>
                        @if (session('message'))
    <div class="notification  is-warning">
        {{ session('message') }}
    </div>
@endif
                    </div>
                </div>
            </div>

    </section>
    <script>
    // The following code is based off a toggle menu by @Bradcomp
// source: https://gist.github.com/Bradcomp/a9ef2ef322a8e8017443b626208999c1
(function() {
    var burger = document.querySelector('.burger');
    var menu = document.querySelector('#'+burger.dataset.target);
    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });
})();</script>
</body>

</html>
