@extends('layouts.app')

@section('content')

    <div class="text-center">
        Dicci la tua !!
    </div>

    @if ($errors->any())
        <div class="alert alert-danger my-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- {{ Auth::user()->id }} --}}

    <form method="POST" action="{{ route('admin.posts.store') }}" class="mx-5 my-3">

        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="string" class="form-control @error('title') is-invalid @enderror" id="">
            {{-- Errori inline
                legati alla validazione in STORE --}}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id=""></textarea>
                        {{-- Errori inline
                            legati alla validazione in STORE --}}
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tags</label>

            @foreach ($tags as $tag)
                <label for="">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    {{-- NAME genererà il nome della KEY nell'ARRAY della REQUEST,
                    ed il VALUE verrà abbinato al NAME.... 
                    essendo molteplici i dati che passo alla REQUEST,
                    li mando all'intenro di un ARRAY -> tags[] --}}
                    {{ $tag->name }}
                </label>
            @endforeach

        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
