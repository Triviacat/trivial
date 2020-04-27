<aside class="menu">
    <p class="menu-label has-text-light">@lang('trivial.admin')</p>
    <ul class="menu-list">
        @if (Auth::user()->hasRole('admin'))
        <li><a class="has-text-light" href="/topics">@lang('trivial.topics')</a></li>
        <li><a class="has-text-light" href="/sets">@lang('trivial.sets')</a></li>
        <li><a class="has-text-light" href="/questions">@lang('trivial.questions')</a></li>
        <li><a class="has-text-light" href="/users">@lang('trivial.users')</a></li>
        <li><a class="has-text-light" href="/roles">@lang('trivial.roles')</a></li>
        <li><a class="has-text-light" href="/permissions">@lang('trivial.permissions')</a></li>
        <hr>
        @endif
        <li><a class="has-text-light" href="/games">@lang('trivial.games')</a></li>

    </ul>
</aside>
