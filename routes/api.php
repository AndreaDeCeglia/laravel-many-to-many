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
    return $request->user();
});

//si generano URL che restituisce un oggetto json
//ci servirà come API

//Route::get('/posts', 'PostController@index');

// queste rotte, del 1parametro, di default, viene aggiunto un pref. che si chiama API
//localhost:8000/api/posts

Route::namespace('Api')
//namespace è il path che ci porta al file
    ->prefix('/posts')
    ->group(function(){
        Route::get('/', 'PostController@index');
    });

    //creare un controller dentro una cartelle API
    // php artisan make:controller Api/PostController --api //
    //ci ritornerà un controller di Risorsa per le API