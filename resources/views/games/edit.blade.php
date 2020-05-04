
@inject('games', 'App\Game')

@extends('layouts.app')

@section('title', 'Edit game: ' . $game->title)
@section('content')
{{-- @dump(json_encode($game->usersInvited())) --}}
<form action="/games/{{ $game->id }}" method="post">
    @csrf
        @method('PATCH')
        <game-form :game={{ $game }} :user_id="{{ auth()->user()->id }}" :users_invited="{{ json_encode($game->usersInvited()) }}"></game-form>
    </form>

  @include('errors')

@endsection
