
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    {{-- ora qui si inserisce Vue --}}
    <div id="root">

    </div>
    
    {{-- qua si carica il file JS che permette di leggere Vue -> resources/js/app.js --}}
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>