@extends('layouts.app')

@section('content')
<div class="container" style="max-width:925px">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <h3>{{$post->user->username}}</h3>
                <h5>{{$post->caption}}</h5>
            </div>
        </div>
    </div>
</div>
@endsection