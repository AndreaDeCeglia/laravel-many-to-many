@extends('layouts.app')

@section('content')

    <h3>
        BenTornato {{ $user->name }}
    </h3>
    
    <h1>
        qui stamperò i post
    </h1>

    @foreach ($posts as $elem)
        {{ $elem->title }}
    @endforeach

@endsection