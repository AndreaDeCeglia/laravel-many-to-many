
{{-- 
//tutte le rotte al di fuori dell'autenticazione avranno il seguente atterraggio
Route::get('{any?}', function(){
    return view('guest.home'); //all'interno di questa VIEW, ci sarà la struttura HTML
})->where("any", ".*"); --}}

{{-- 
@extends('layouts.app')

@section('content')
    <h1>Benvenuto guest</h1>
    <div>test della pagina guest, che vede chiunque senza loggarsi.</div>
    <div>questo testo è scritto dentro uno yeld che è generato da laravel e si trova in app.blade.php, dentro la cartella
        layouts nelle view, generata anche lei in automatico.</div>
    <div>tutto quello che va in questa pagina è dentro il tag main</div>
    <br>
    <div>qui è dove verrà implementato Vue</div>
@endsection  --}}

@extends('layouts.app')

@section('content')
    <div id="root"></div>
@endsection