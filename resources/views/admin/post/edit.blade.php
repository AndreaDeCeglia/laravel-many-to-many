@extends('layouts.app')

@section('content')

    <div class="text-center">
        Modifica il Post
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

    <form method="POST" action="{{ route('admin.posts.update', $elem->id) }}" class="mx-5 my-3">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input value="{{ $elem->title }}" name="title" type="string" class="form-control @error('title') is-invalid @enderror" id="">
            {{-- Errori inline
                legati alla validazione in STORE --}}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="">
                {{ $elem->body }}
            </textarea>
                        {{-- Errori inline
                            legati alla validazione in STORE --}}
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        {{-- <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        {{-- <div class="mb-3">
            <label class="form-label">Tags</label>

            @foreach ($tags as $tag)
                <label for="">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    {{ $tag->name }}
                </label>
            @endforeach

        </div> --}}

        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>

@endsection
