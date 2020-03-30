<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all()->sortByDesc('created_at');
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
        //
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
        Game::findOrFail($id)->delete();
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
        $game->update();
        return redirect('/games');
    }
    /**
     * Stop a game.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function stop(Game $game)
    {
        $game->estate = 3;
        $game->update();
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
        $game->players = $players;
        $game->update();
        return redirect('/games');
    }
}
