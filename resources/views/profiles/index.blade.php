@extends('layouts.app')

@section('content')
<div class="container" style="max-width:925px">
  <div class="row">
    <div class="col-3 p-2 pl-5">
      <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" />
    </div>
    <div class="col-9 p-3 pl-5">
      <div class="d-flex inline justify-content-between align-items-baseline">
        <div class="d-flex">
          <h2 class="h3">{{$user->username ?? ""}}</h2>
          @if(!isset(auth()->user()->id) || $user->id !== auth()->user()->id)
          <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
          @endif
        </div>
        @can('update', $user->profile)
        <a href="/p/create">Add New Post</a>
        @endcan
      </div>
      @can('update', $user->profile)
      <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
      @endcan
      <div class="d-flex">
        <div class="pr-5 pt-4"><strong>{{ $user->posts->count()}}</strong> posts</div>
        <div class="pr-5 pt-4"><strong>{{ $user->profile->followers->count()}}</strong> followers</div>
        <div class="pr-5 pt-4"><strong>{{$user->following->count()}}</strong> following</div>
      </div>
      <div>
        <div class="mt-4"><strong>{{$user->profile->title ?? ""}}</strong></div>
        <div>{{$user->profile->description ?? ""}}</div>
        <a href="{{$user->profile->url ?? ''}}"><strong>{{$user->profile->url ?? ""}}</strong></a>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach($user->posts as $post)
    <div class="col-4 pb-4">
      <a href="/p/{{$post->id}}">
        <img src="/storage/{{$post->image}}" class="w-100 pt-2">
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection