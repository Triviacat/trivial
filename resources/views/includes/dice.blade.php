<div class="content">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title has-background-warning">
                @if ($game->status == 'closed')
                @lang('trivial.gameIsClosed')
                @elseif ($game->status == 'open' && ! isset($game->turn))
                @lang('trivial.gameNotStarted')
                @elseif (isset($game->turn))
                    @lang('trivial.plays'):&nbsp; <whosturn :turn="{{ $game->turn }}" :turnuser="{{ $game->turn->user }}">
                </whosturn>

                @endif
            </p>
        </header>
        <div class="card-content">
            <div class="columns">
                <div class="column has-text-centered">
                    <div class="field">
                        @if (isset($game->turn))
                            <label class="label">@lang('trivial.dice')</label>
                            <div class="control has-text-centered">
                                <dice :turn="{{ $game->turn }}" :turnuser="{{ $game->turn->user }}"></dice>
                            </div>
                        @endif
                    </div>
                    <div>
                        @if (isset($game->turn))
                            <dicebutton :turn="{{ $game->turn }}" :user="{{ auth()->user() }}"></dicebutton>
                        @endif
                    </div>
                </div>
                <div class="column has-text-centered">
                    @if (isset($game->turn))
                        <box :turn="{{ $game->turn }}" :turnuser="{{ $game->turn->user }}" :box="{{ $game->turn->box }}"
                            :user="{{ auth()->user() }}" :players="{{ json_encode($game->users()) }}"></box>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
