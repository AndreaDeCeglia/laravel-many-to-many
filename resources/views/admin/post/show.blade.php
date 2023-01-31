@extends('layouts.app')

@section('content')
    <div id="text-center" class="text-center">
        <h1>
            {{ $elem->title }}
        </h1>
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