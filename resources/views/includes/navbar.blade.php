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
                <a class="navbar-item " href="{{ route('games.index') }}">@lang('trivial.games')</a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                    <div class="navbar-dropdown">
                        <a class="dropdown-item" href="{{ route('profile.show', auth()->user()->id) }}">@lang('trivial.profile')</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
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
