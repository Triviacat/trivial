@extends('layouts.app')

@section('title', 'Games')


@section('content')

<a class="button content" href="/games/create">Create new game</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Game</th>
        <th>Status</th>
        <th>Host</th>
        <th>Players</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
        {{-- @dump($game) --}}
        {{-- <game-details> --}}
        <tr is="gamelist" :game="{{ $game }}"></tr>
        {{-- </game-details> --}}
      @endforeach
    </tbody>
  </table>




@endsection
