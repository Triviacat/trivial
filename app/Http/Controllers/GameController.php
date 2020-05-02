<?php

namespace App\Http\Controllers;

use App\Events\GameStatusHasChanged;
use App\Events\PlayerJoinsGame;
use App\Events\PlayerLeavesGame;
use App\Game;
use App\Topic;
use App\Turn;
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
        return view('games.create');
        $game = new Game;
        $game->user_id = auth()->user()->id;
        $game->players = array(auth()->user()->id);
        $game->save();

        # add board slot
        // $turn = new Turn;
        // $turn->game_id = $game->id;
        // $turn->user_id = $game->user_id;
        // $turn->box_id = 1;
        TurnController::initialSlot($game->user_id, $game->id);
        // TurnController::slots($turn);

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
        // return $invited;
        $users = array();
        foreach ($invited as $user) {
            $users[] = $user->id;
        }
        // return $users;
        $attributes['invited'] = $users;
        $attributes['players'] = array((int)$attributes['user_id']);
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
        return view('games.edit')->with($game);
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
    // /**
    //  * Stop a game.
    //  *
    //  * @param  \App\Game  $game
    //  * @return \Illuminate\Http\Response
    //  */
    // public function stop(Game $game) // TODO: should this be changed to 'pause'??
    // {
    //     $game->status = 3;
    //     $game->update();
    //     GameStatusHasChanged::dispatch($game);
    //     return redirect('/games');
    // }
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
        $game->status = 'closed';
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
        // TODO: limit users in game by 6?
        $players = $game->players;

        $players[] = auth()->user()->id;
        $game->players = $players;
        $game->update();

        # add board slot
        TurnController::initialSlot(auth()->user()->id, $game->id);

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
