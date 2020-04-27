
@inject('games', 'App\Game')

@extends('layouts.app')

@section('title', 'Edit game: ' . $game->title)
@section('content')
<form action="/games/{{ $game->id }}" method="post">
        @method('PATCH')
        @include ('games.form', [
            'buttonText' => 'Update game'
        ])
    </form>

  @include('errors')

@endsection
