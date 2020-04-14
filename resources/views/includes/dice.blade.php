<div  class="content">
<div class="card">
    <header class="card-header">
        {{-- {{ var_dump($game->turn->box) }} --}}
        <p class="card-header-title has-background-warning">
            @if (isset($game->turn))
            Juga:&nbsp; <whosturn :turn="{{ $game->turn }}" :turnuser="{{ $game->turn->user }}"></whosturn>
            @else
            La partida no ha començat. Torna més tard o recarrega la pàgina.
            @endif

        </p>
    </header>
    <div class="card-content">
        <div class="columns">
            <div class="column has-text-centered">
                <div class="field">
                    @if (isset($game->turn))
                    <label class="label">Dau</label>
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
                <box :turn="{{ $game->turn }}" :turnuser="{{ $game->turn->user }}" :box="{{ $game->turn->box }}" :user="{{ auth()->user() }}" :players="{{ json_encode($game->users()) }}"></box>
                @endif
                {{-- <div>
                    <boxbutton :turn="{{ $game->turn }}" :user="{{ auth()->user() }}"></boxbutton>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
