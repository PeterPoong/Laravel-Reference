@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="{{ $post->image }}" class="w-100">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div style="padding-right: 10px;">
                        <img src='/storage/{{ $post->user->profile->image }}' class="rounded-circle w-100"
                            style="max-width:60px">
                    </div>
                    <div class="d-flex">
                        <h5><b><a href="/profile/{{ $post->user->id }}"
                            style="text-decoration: none; color: inherit;">{{ $post->user->username }}</a></b></h5>
                        <a href="#" style="padding-left:20px;"><b>Follow</b></a>
                    </div>
                </div>
                <hr>
                <p>
                    <span><b><a href="/profile/{{ $post->user->id }}"
                                style="text-decoration: none; color: inherit;">{{ $post->user->username }}</a></b></span>
                    {{ $post->caption }}
                </p>


            </div>
        </div>


    </div>
@endsection
