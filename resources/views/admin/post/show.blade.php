@extends('layouts.app')

@section('content')
    <div id="text-center">
        <h1>
            {{ $elem->title }}
        </h1>
        <p>
            {{ $elem->body }}
        </p>
    </div>
@endsection