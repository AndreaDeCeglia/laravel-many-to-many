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
        //*** CONTROLLERS PER LE CRUD ***** */
        //UNA VOLTA LANCIATO DA TERMINALE:
        // php artisan make:controller Admin/PostController -r //
        Route::resource('/posts', PostController::class);
        //una volta creato il Controller Risorsa, si possono costruire le pagine
        //dedicate alle CRUD, e di conseguenza andare a scirvere le funzioni
        //in PostController
    });


//trovare un modo per gestire tutte le rotte che non utilizzano l'autenticazione
//tutte le rotte al di fuori dell'autenticazione avranno il seguente atterraggio
Route::get('{any?}', function(){
    return view('guest.home'); //all'interno di questa VIEW, ci sarà la struttura HTML
})->where("any", ".*");