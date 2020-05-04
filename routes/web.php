<?php

use App\Game;
use App\Turn;
use App\User;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return redirect()->route('home');
});

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/play', 'HomeController@play')->name('home');
Route::post('/notify', 'HomeController@notify')->name('notify');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('/topics', 'TopicController')->middleware('verified','role:admin');
Route::resource('/sets', 'SetController')->middleware('verified','role:admin');
Route::resource('/questions', 'QuestionController')->middleware('verified','role:admin');

Route::group(['prefix' => 'admin', 'middleware' => ['verified','role:admin']], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/{user}', 'UserController@show')->name('admin.users.show');
        Route::get('/', 'UserController@index')->name('admin.users');
        Route::get('/{user}/edit', 'UserController@edit')->name('admin.users.edit');
        Route::patch('/{user}', 'UserController@update')->name('admin.users.update');
    });
});

Route::get('/profile/{user}', 'UserController@profileShow')->name('profile.show')->middleware('auth');
Route::get('/profile/{user}/edit', 'UserController@profileEdit')->name('profile.edit')->middleware('auth');
Route::post('/profile/{user}/color/update', 'UserController@profileColorUpdate')->name('profile.color.update')->middleware('auth');
// Route::get('/profile/{user}/games', 'UserController@profileGames')->name('profile.games')->middleware('auth');

// Route::get('/users', 'UserController@index')->name('users')->middleware('auth');
// Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('auth');
// Route::patch('/users/{user}', 'UserController@update')->name('users.update')->middleware('auth');

Route::group(['prefix' => 'roles', 'middleware' => ['verified','role:admin']], function () {
    Route::get('/', 'RoleController@index')->name('roles')->middleware('auth');
    Route::get('/create', 'RoleController@create')->name('roles.create')->middleware('auth');
    Route::post('/', 'RoleController@store')->name('roles.store')->middleware('auth');
    Route::get('/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('auth');
    Route::patch('/{role}', 'RoleController@update')->name('roles.update')->middleware('auth');
    Route::delete('/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('auth');
});

Route::group(['prefix' => 'permissions', 'middleware' => ['verified','role:admin']], function () {
    Route::get('/', 'PermissionController@index')->name('permissions')->middleware('auth');
    Route::get('/create', 'PermissionController@create')->name('permissions.create')->middleware('auth');
    Route::post('/', 'PermissionController@store')->name('permissions.store')->middleware('auth');
    Route::get('/{permission}/edit', 'PermissionController@edit')->name('permissions.edit')->middleware('auth');
    Route::patch('/{permission}', 'PermissionController@update')->name('permissions.update')->middleware('auth');
    Route::delete('/{permission}', 'PermissionController@destroy')->name('permissions.destroy')->middleware('auth');
});

// Route::resource('/games', 'GameController')->middleware('auth');
Route::group(['prefix' => 'games', 'middleware' => ['verified']], function () {

    Route::get('/', 'GameController@index')->name('games.index');
    Route::post('/', 'GameController@store')->name('games.store');
    Route::get('/create', 'GameController@create')->name('games.create');
    Route::get('/{game}', 'GameController@show')->name('games.show');
    Route::delete('/{game}', 'GameController@destroy')->name('games.destroy');
    Route::patch('/{game}', 'GameController@update')->name('games.destroy');
    Route::get('/{game}/edit', 'GameController@edit')->name('games.edit');
    Route::get('/{game}/start', 'GameController@start')->name('games.start');
    Route::get('/{game}/stop', 'GameController@stop')->name('games.stop');
    Route::get('/{game}/open', 'GameController@open')->name('games.open');
    Route::get('/{game}/close', 'GameController@close')->name('games.close');
    Route::get('/{game}/join', 'GameController@join')->name('games.join');
    Route::get('/{game}/leave', 'GameController@leave')->name('games.leave');
});
