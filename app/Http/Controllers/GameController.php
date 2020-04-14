<?php

namespace App\Http\Controllers;

use App\Events\EnableDiceButton;
use App\Events\GameStatusHasChanged;
use App\Events\NotifyWhosTurn;
use App\Events\PlayerJoinsGame;
use App\Events\PlayerLeavesGame;
use App\Game;
use App\Topic;
use App\Turn;
use App\User;
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
        $games = Game::with('user')->OrderBy('created_at','desc')->get();
        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game = new Game;
        $game->user_id = auth()->user()->id;
        $game->players = array(auth()->user()->id);
        $game->save();
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # delete the game
        Game::findOrFail($id)->delete();
        # and its associated turns
        Turn::where('game_id', $id)->delete();
        // cheeses are being deleted by cascade
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
        $game->estate = 2;
        # randomize players
        $rplayers = $game->players;
        shuffle($rplayers);
        $game->players = $rplayers;
        $game->update();

        # notify change of game status
        GameStatusHasChanged::dispatch($game);

        # start a new turn // TODO: it should only add a new turn if only starting but not if resuming
        TurnController::new($game);


        return redirect('/games/' . $game->id);
    }
    /**
     * Stop a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function stop(Game $game) // TODO: should this be changed to 'pause'??
    {
        $game->estate = 3;
        $game->update();
        GameStatusHasChanged::dispatch($game);
        return redirect('/games');
    }
    /**
     * Open a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function open(Game $game)
    {
        $game->estate = 1;
        $game->update();
        GameStatusHasChanged::dispatch($game);
        return redirect('/games');
    }
    /**
     * Close a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function close(Game $game)
    {
        $game->estate = 0;
        $game->update();
        GameStatusHasChanged::dispatch($game);
        return redirect('/games');
    }

    /**
     * Join a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function join(Game $game)
    {
        $players = $game->players;

        $players[] = auth()->user()->id;
        $game->players = $players;
        $game->update();

        PlayerJoinsGame::dispatch($game);

        return redirect('/games');
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

        $players = array_diff($players, array(auth()->user()->id));
        // return $players;
        $game->players = $players;

        $game->update();

        PlayerLeavesGame::dispatch($game);

        return redirect('/games');
    }



}