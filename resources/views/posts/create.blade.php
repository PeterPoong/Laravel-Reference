@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-8 offset-2">
                <div>
                    <h1 class="d-flex justify-content-center">Add New Post</h1>
                </div>
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Post caption') }}</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                        name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-8 offset-2">
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Post Image') }}</label>
                    <input type="file", class="form-control-file" id="image" name="image">

                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="col-8 offset-2">
                <div class="row">
                    <button class="btn btn-primary" >New Post</button>
                </div>
            </div>


          
        </form>

    </div>
@endsection
