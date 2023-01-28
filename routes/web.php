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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//gestisce le rotte sotto il punto di vista di autenticazione
//definire quale middleware abbiamo creato e richiamiamo
Route::middleware('auth')
    ->namespace('Admin') //Cartella in cui si trovano i controller che indico qui cosi non lo riscrivo nelle route
    ->prefix('admin') // il mio localhost prenderà 8080/admin/   che diventa url base
    ->name('admin.') // da il nome al prefisso dei name delle rotte
    ->group(function(){ //nella funzione group(), vado a scrivere tutti quei controller che saranno all'interno della cartella Admin, e che hanno bisogno di autenticazione
        Route::get('/', 'HomeController@index')->name('index');
    });


//trovare un modo per gestire tutte le rotte che non utilizzano l'autenticazione

