@extends('layouts.app-game')

{{-- @section('title', $recipe->title) --}}


@section('content')

{{-- <h3 class="is-size-3">Game</h3> --}}

<div class="columns">

    <div class="column is-three-fifths">
        <div class="content">
            @include('includes.topics')
        </div>
        <board :turn="{{ $game->turn }}" :game="{{ $game }}" :players="{{ json_encode($game->users()) }}"></board>
        {{-- <figure class="image">
            <img src="/assets/images/trivial3.png">
        </figure> --}}
    </div>
    <div class="column">
        @include('includes.cheeses')
            @include('includes.dice')
        @if (isset($game->turn))
        <div class="content">
            <question :turn="{{ $game->turn }}" :user="{{ auth()->user() }}"></question>
        </div>
        @endif
    </div>



</div>



@endsection
