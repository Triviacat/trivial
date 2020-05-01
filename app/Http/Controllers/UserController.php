<?php

namespace App\Http\Controllers;

use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // return request();
        $user->syncPermissions(request()->permissions ?? array());
        $user->syncRoles(request()->roles ?? array());
        // $users->update($request);
        return redirect()->route('admin.users');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'name' => ['required', 'min:3'], //validation rules can be members of an array
            'display_name' => ['required', 'min:3'], //validation rules can be members of an array
            'description' => ['required', 'min:3'], //validation rules can be members of an array
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function profileShow(User $user)
    {
        if (Auth::user() == $user) {
            $gamesIn = UserController::profileGames($user);
            $user->gamesIn = $gamesIn;
            return view('profiles.show', [
                'user' => $user,
            ]);
        }
        else {
            return abort('403');
        }
    }

    /**
     * Show a form to edit the profile.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function profileEdit(User $user)
    {

    }

    /**
     * Show games per user.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public static function profileGames(User $user)
    {
        $games = Game::all();
        // return $game/s;
        $gamesIn = array();
        foreach ($games as $game) {
            if (($game->user_id == $user->id) ||(in_array($user->id, $game->players))) {
                $gamesIn[] = $game;
            }
        }
        return $gamesIn;
    }
}
