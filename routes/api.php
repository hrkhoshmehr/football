<?php

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

});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::middleware('auth:api')->group(function () {

    #Team
    Route::get('teams', 'TeamController@index');
    Route::get('teams/{team}', 'TeamController@show');
    Route::post('teams/create', 'TeamController@create');

    #Player
    Route::post('players/{team}/create', 'PlayerController@create');
    Route::patch('players/{player}/update', 'PlayerController@update');

});
