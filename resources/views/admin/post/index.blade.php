@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>
            BenTornato {{ $user->name }}
        </h3>
        
        <h1>
            qui stamperò i post
        </h1>

        <div>
            <a href="{{ route('admin.posts.create') }}">
                dicci la tua !!!
            </a>
        </div>
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">title</th>
                    <th scope="col">body</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $elem)
                <tr>
                    <td>{{$elem->id}}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $elem->id) }}">
                            {{$elem->title}}
                        </a>
                    </td>
                    <td>{{$elem->body}}</td>
                    <td>
                        <form action="{{route('admin.posts.destroy', $elem->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark" type="submit">
                                X
                            </button>
                        </form> 
                        <div>
                            <a href="{{route('admin.posts.edit', $elem->id)}}">
                                 EdiT
                            </a>
                        </div>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

@endsection