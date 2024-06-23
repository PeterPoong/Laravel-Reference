@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src='{{$user->profile->profileImage()}}' style="max-height:150px; padding-top:20px; padding-left:100px;" class="rounded-circle">
                {{-- <img src="/img/user2.jpeg" style="max-height:150px; padding-top:20px;" class="rounded-circle"> --}}
            </div>
            <div class="col-9" style="padding-top:10px">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center" style="padding-bottom: 20px">
                        <div class="h4">{{ $user->username }}</div>
                        <follow-button user-id="{{$user->id}}" follow="{{$followStatus}}"></follow-button>
                     
                    </div>
                    
                    @can('update', $user->profile)
                        <a href="/p/create">Add New Post</a>
                    @endcan
                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan

                <div class="d-flex">
                    <div style="padding:5px"><strong>{{ count($user->posts) }}</strong>post</div>
                    <div style="padding:5px"><strong>{{count($user->profile->followers)}}</strong> followers</div>
                    <div style="padding:5px"><strong>{{count($user->following)}}</strong> following</div>
                </div>
                <div style="padding-top:10px">
                    <div><strong>{{ $user->profile->title }}</strong></div>
                    <div>{{ $user->profile->description }}</div>
                    <div>{{ $user->profile->url }}</div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-top:50px">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="{{ $post->image }}" class="w-100">
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
