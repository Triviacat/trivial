<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('/topics', 'TopicController')->middleware('auth');
Route::resource('/sets', 'SetController')->middleware('auth');
Route::resource('/questions', 'QuestionController')->middleware('auth');

Route::get('/users', 'UserController@index')->name('users')->middleware('auth');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('auth');
Route::patch('/users/{user}', 'UserController@update')->name('users.update')->middleware('auth');

Route::get('/roles', 'RoleController@index')->name('roles')->middleware('auth');
Route::get('/roles/create', 'RoleController@create')->name('roles.create')->middleware('auth');
Route::post('/roles', 'RoleController@store')->name('roles.store')->middleware('auth');
Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('auth');
Route::patch('/roles/{role}', 'RoleController@update')->name('roles.update')->middleware('auth');
Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('auth');

Route::get('/permissions', 'PermissionController@index')->name('permissions')->middleware('auth');
Route::get('/permissions/create', 'PermissionController@create')->name('permissions.create')->middleware('auth');
Route::post('/permissions', 'PermissionController@store')->name('permissions.store')->middleware('auth');
Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit')->middleware('auth');
Route::patch('/permissions/{permission}', 'PermissionController@update')->name('permissions.update')->middleware('auth');
Route::delete('/permissions/{permission}', 'PermissionController@destroy')->name('permissions.destroy')->middleware('auth');
