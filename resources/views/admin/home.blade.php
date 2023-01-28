@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                     {{-- qui vado ad inserire il link che farà atterrare alla lista dei Post --}}

                     <div>
                        <a href="{{ route('admin.posts.index') }}">
                            Lista Post
                        </a>     
                    </div>       
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
