<?php

namespace App\Http\Controllers;

use App\Events\GameStatusHasChanged;
use App\Events\NotifyGameUpdate;
use App\Events\PlayerJoinsGame;
use App\Events\PlayerLeavesGame;
use App\Game;
use App\Topic;
use App\Turn;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $games = Game::all()->sortByDesc('created_at');
        $games = Game::with('user')->OrderBy('created_at', 'desc')->get();
        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
        $game = new Game;
        $game->user_id = auth()->user()->id;
        $game->players = [auth()->user()->id];
        $game->save();

        TurnController::initialSlot($game->user_id, $game->id);

        return redirect('/games');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateRequest();
        $invited = json_decode($attributes['invited']);
        if (is_array($invited)) {
            $users = [];
            foreach ($invited as $user) {
                $users[] = $user->id;
            }
            // return $users;
            $attributes['invited'] = $users;
        } else {
            $attributes['invited'] = [];
        }

        $attributes['players'] = [(int) $attributes['user_id']];
        Game::create($attributes);
        return redirect('/games');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $topics = Topic::all();
        return view('games.show', compact('game', 'topics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $attributes = $this->validateRequest();
        $invited = json_decode($attributes['invited']);
        // return $invited;
        $users = [];
        foreach ($invited as $user) {
            $users[] = $user->id;
        }
        // return $users;
        $attributes['invited'] = $users;
        $attributes['players'] = [(int) $attributes['user_id']];
        $game->update($attributes);
        return redirect('/games');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete the game
        Game::findOrFail($id)->delete();
        // and its associated turns
        Turn::where('game_id', $id)->delete();
        // cheeses are being deleted by cascade
        DB::table('game_slot')
            ->where('game_id', '=', $id)
            ->delete();
        return redirect('/games');
    }

    /**
     * Start a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function start(Game $game)
    {
        $game->status = 'started';
        // randomize players
        $rplayers = $game->players;
        shuffle($rplayers);
        $game->players = $rplayers;
        $game->update();

        // notify change of game status
        GameStatusHasChanged::dispatch($game);

        // start a new turn
        TurnController::new($game);

        return redirect('/games/' . $game->id);
    }

    /**
     * Open a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function open(Game $game)
    {
        $game->status = 'open';
        $game->update();
        GameStatusHasChanged::dispatch($game);
        return $game;
        // return redirect('/games');
    }

    /**
     * Close a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function close(Game $game)
    {
        $game->status = 'closed';
        $game->update();
        GameStatusHasChanged::dispatch($game);
        return $game;
        // return redirect('/games');
    }

    /**
     * Join a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function join(Game $game)
    {
        // TODO: limit users in game by 6? Is it limited now? Where?
        $players = $game->players;

        $players[] = auth()->user()->id;
        $game->players = $players;
        $game->update();

        //user joining
        $user = User::find(auth()->user()->id);

        // add board slot
        TurnController::initialSlot(auth()->user()->id, $game->id);

        PlayerJoinsGame::dispatch($game, $user);

        return $game;

        // return redirect('/games');
    }

    /**
     * Leave a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function leave(Game $game)
    {
        $players = $game->players;

        $players = array_diff($players, [auth()->user()->id]);
        // return $players;
        $game->players = $players;

        $game->update();

        //user leaving
        $user = User::find(auth()->user()->id);

        DB::table('game_slot')
            ->where('game_id', $game->id)
            ->where('user_id', auth()->user()->id)
            ->delete();
        TurnController::slots($game->id);
        PlayerLeavesGame::dispatch($game, $user);
        NotifyGameUpdate::dispatch($game);

        return $game;

        // return redirect('/games');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'private' => ['boolean'], //validation rules can be members of an array
            'chat' => 'nullable|url',
            'password' => 'nullable|string',
            'invited' => 'nullable|json',
            'user_id' => 'required|numeric'
        ]);
    }
}
