@extends('layouts.appgame')

{{-- @section('title', $recipe->title) --}}


@section('content')

{{-- <h3 class="is-size-3">Game</h3> --}}

<div class="columns">

    <div class="column is-half">
        <div class="content">
            @include('includes.topics')
        </div>
        <div class="box">
            <div class="columns">
                <div class="column"><span class="label">Chat</span><span>{{ $game->chat }}</span></div>
                <div class="column"><span class="label">Password</span><span>{{ $game->password }}</span></div>
            </div>

        </div>
        @if (isset($game->turn))
            <board :turn="{{ $game->turn }}" :game="{{ $game }}" :players="{{ json_encode($game->users()) }}"></board>
        @endif
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
