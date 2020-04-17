<?php

use App\Game;
use App\Question;
use App\Topic;
use App\Turn;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => 'api'], function () {
    Route::get('games', function () {
        $games = Game::all()->sortByDesc('created_at');
        return $games;
    });
    Route::get('games/{id}', function ($id) {
        $game = Game::where('id', $id)->get();
        return $game;
    });
    Route::get('games/{id}/users', function ($id) {
        $game = Game::find($id);
        return $game->users();
    });
    Route::get('users/{id}', function ($id) {
        $user = User::where('id', $id)->get();
        return $user;
    });
    Route::get('users/{id}/name', function ($id) {
        $user = User::find($id);
        return $user->name;
    });
    Route::get('turns/{id}', function ($id) {
        $turn = Turn::where('id', $id)->get();
        return $turn;
    });
    Route::post('turns/{turn}/roll', 'TurnController@roll');
    Route::get('turns/{turn}/box/undo', 'TurnController@boxUndo');
    Route::post('turns/{turn}/box', 'TurnController@box');
    Route::post('turns/{turn}/question', 'TurnController@question');
    Route::get('turns/{turn}/slots', 'TurnController@slots');
    Route::get('turns/{turn}/slot', 'TurnController@slot'); // just for testing. // TODO: deactivate it

    Route::get('questions/{id}', function ($id) {
        $question = Question::find($id);
        $topic = Topic::find($question->topic_id);
        $question->topic = $topic;
        return $question;
    });

    // Route::post('turns/{turn}/box/options', 'TurnController@options');
    Route::post('options', 'TurnController@options');
// });
