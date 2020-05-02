<aside class="menu">
    @if (Auth::user()->hasRole('admin'))
    <p class="menu-label ">@lang('trivial.admin')</p>
    <ul class="menu-list">
        <li><a class="" href="/topics">@lang('trivial.topics')</a></li>
        <li><a class="" href="/sets">@lang('trivial.sets')</a></li>
        <li><a class="" href="/questions">@lang('trivial.questions')</a></li>
        <li><a class="" href="{{ route('admin.users') }}">@lang('trivial.users')</a></li>
        <li><a class="" href="/roles">@lang('trivial.roles')</a></li>
        <li><a class="" href="/permissions">@lang('trivial.permissions')</a></li>
        <hr>
    </ul>
    @endif
    <p class="menu-label ">@lang('trivial.menu')</p>
    <ul class="menu-list">
        <li><a href="/games">@lang('trivial.games')</a></li>
        <li><a href="{{ env('TRIVIACAT_DOCS_URL') }}">@lang('trivial.instructions')&nbsp;<i class="fas fa-external-link-alt"></i></a></li>
        <li><a href="{{ env('TRIVIACAT_PREGUNTES_URL') }}">@lang('trivial.questions')&nbsp;<i class="fas fa-external-link-alt"></i></a></li>
    </ul>
</aside>
