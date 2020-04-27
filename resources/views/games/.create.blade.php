
@extends('layouts.app')

@section('title', 'Create a new game')

@section('content')
<h1 class="is-size-1">Create Game</h1>
    <form action="/games" method="post">
        @include ('games.form', [
            'game' => new App\Game,
              'buttonText' => 'Create game'
          ])    </form>

  @include('errors')

@endsection
