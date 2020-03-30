<aside class="menu">
    <p class="menu-label has-text-light">Admin</p>
    <ul class="menu-list">
        @if (Auth::user()->hasRole('admin'))
        <li><a class="has-text-light" href="/topics">Topics</a></li>
        <li><a class="has-text-light" href="/sets">Sets</a></li>
        <li><a class="has-text-light" href="/questions">Questions</a></li>
        <li><a class="has-text-light" href="/users">Users</a></li>
        <li><a class="has-text-light" href="/roles">Roles</a></li>
        <li><a class="has-text-light" href="/permissions">Permissions</a></li>
        <hr>
        @endif
        <li><a class="has-text-light" href="/games">Games</a></li>

    </ul>
</aside>
