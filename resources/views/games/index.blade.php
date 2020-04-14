@extends('layouts.app')

@section('title', 'Games')


@section('content')

<a class="button content" href="/games/create">Create new game</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Game</th>
        <th>Estate</th>
        <th>Host</th>
        <th>Players</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
        {{-- <game-details> --}}
        <tr>
            <td><a href="/games/{{ $game->id }}">{{ $game->id }}</a></td>
        <td><gamestatus :game="{{ $game }}"></gamestatus>
            {{-- {{ $game->status()}} --}}
        </td>
        <td>{{ $game->user->name}}</td>
        {{-- <td>{{ count($game->players) }}</td> --}}
        <td><playersingame :game="{{ $game }}" :user="{{ auth()->user() }}"></playersingame></td>
        <td>{{ $game->updated_at}}</td>
            <td>
                @if ($game->user_id == auth()->user()->id)
                @if ($game->estate != 1 && $game->estate != 4)
                <a href="/games/{{ $game->id }}/open" class="button is-primary is-small">Open</a>
                @endif
                @if ($game->estate != 0 && $game->estate != 4)
                <a href="/games/{{ $game->id }}/close" class="button is-warning is-small">Close</a>
                @endif
                @if ($game->estate != 2 && $game->estate != 4)
                <a href="/games/{{ $game->id }}/start" class="button is-success is-small">Start</a>
                @endif
                @if ($game->estate != 3 && $game->estate != 4)
                <a href="/games/{{ $game->id }}/stop" class="button is-danger is-outlined is-small">Stop</a>
                @endif



                <form method="post" action="/games/{{ $game->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete</button>
                </form>
                @endif
            </td>
          </tr>
        {{-- </game-details> --}}
      @endforeach
    </tbody>
  </table>




@endsection
