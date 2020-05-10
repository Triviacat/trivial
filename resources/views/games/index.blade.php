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
        <tr>
            <td>
                <game-access-button :game="{{ $game }}" :user="{{ auth()->user() }}"></game-access-button>
            </td>
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
                <open-game-button :game="{{ $game }}"></open-game-button>
                <close-game-button :game="{{ $game }}"></close-game-button>
                <start-game-button :game="{{ $game }}"></start-game-button>
                <edit-game-button :game="{{ $game }}"></edit-game-button>
                <form method="post" action="/games/{{ $game->id }}" style="display: inline-block;"
                    onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small"><i class="fas fa-trash-alt"></i></button>
                </form>

                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
