@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="col-8 offset-2">
                <div>
                    <h1 class="d-flex justify-content-center">Update Profile</h1>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Edit title') }}</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        name="title" value="{{ old('title') ?? $user->profile->title}}" autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Edit description') }}</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description')?? $user->profile->description}}" autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="URL" class="col-md-4 col-form-label">{{ __('Edit URL') }}</label>

                    <input id="URL" type="text" class="form-control @error('URL') is-invalid @enderror"
                        name="URL" value="{{ old('URL')?? $user->profile->url}}" autocomplete="URL" autofocus>

                    @error('URL')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            

            <div class="col-8 offset-2">
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
                    <input type="file", class="form-control-file" id="image" name="image">

                    @error('image')
                            <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="col-8 offset-2">
                <div class="row">
                    <button class="btn btn-primary" >Save Post</button>
                </div>
            </div>


          
        </form>
    
    </div>
@endsection
