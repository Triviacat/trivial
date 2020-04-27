{{-- @dump($game->users()) --}}
@if (isset($game->turn))
    <div  class="content">
        <cheeses :game="{{ $game }}" :players="{{ json_encode($game->users()) }}"></cheeses>
    </div>
@endif
