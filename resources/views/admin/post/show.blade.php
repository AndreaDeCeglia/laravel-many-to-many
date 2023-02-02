@extends('layouts.app')

@section('content')
    <div id="text-center" class="text-center">
        <h1>
            {{ $elem->title }}
        </h1>
        <img class="img-fluid" src="{{ asset("storage/$elem->cover") }}" alt="">
        <h3>
            @if ( $elem->category )
                    {{ $elem->category->name }}
            @endif 
        </h3>
        <p>
            {{ $elem->body }}
        </p>
    </div>
@endsection