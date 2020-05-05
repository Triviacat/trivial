@extends('layouts.app')

@section('title', __('trivial.games'))


@section('content')

<a class="button content" href="/games/create">@lang('trivial.createGame')</a>
<table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
        <tr>
            <th>@lang('trivial.game')</th>
            <th>@lang('trivial.status')</th>
            <th>@lang('trivial.privacity')</th>
            <th>@lang('trivial.host')</th>
            <th>@lang('trivial.players')</th>
            <th>@lang('trivial.created')</th>
            <th>@lang('trivial.actions')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
        {{-- <game-details> --}}
        <tr>
            <td><a href="/games/{{ $game->id }}">{{ $game->id }}</a></td>
            <td>
                <game-status :game="{{ $game }}"></game-status>
            </td>
            <td>
                @if ($game->private)
                    @lang('trivial.privacityTrue')
                @else
                    @lang('trivial.privacityFalse')
                @endif
            </td>
            <td>{{ $game->user->name}}</td>
            <td>
                <players-in-game :game="{{ $game }}" :user="{{ auth()->user() }}" :users_invited="{{ json_encode($game->usersInvited()) }}"></players-in-game>
            </td>
            <td>{{ $game->updated_at}}</td>
            <td>
                @if ($game->user_id == auth()->user()->id)
                {{-- @if ($game->status != 'open' && $game->status != 'over')
                <a href="/games/{{ $game->id }}/open" class="button is-primary is-small">@lang('trivial.doOpen')</a>
                @endif --}}
                {{-- @dump($game) --}}
                <open-game-button :game="{{ $game }}"></open-game-button>
                <close-game-button :game="{{ $game }}"></close-game-button>
                {{-- @if ($game->status != 'closed' && $game->status != 'over')
                <a href="/games/{{ $game->id }}/close" class="button is-warning is-small">@lang('trivial.doClose')</a>
                @endif --}}

                @if ($game->status != 'started' && $game->status != 'over' && $game->status != 'closed')
                <a href="/games/{{ $game->id }}/start" class="button is-success is-small">@lang('trivial.doStart')</a>
                @endif
                @if ($game->status != 'over' && $game->status != 'closed')
                <a href="/games/{{ $game->id }}/edit" class="button is-light is-small">@lang('trivial.edit')</a>
                @endif

                <form method="post" action="/games/{{ $game->id }}" style="display: inline-block;"
                    onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">@lang('trivial.doDelete')</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
