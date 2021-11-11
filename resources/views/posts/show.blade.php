@extends('layouts.app')

@section('content')
<div class="container" style="max-width:825px">
    <div class="row" style="border:solid 1px #CCCCCC">
        <div class="col-7 pl-0">
            <img src="/storage/{{$post->image}}" class="w-100 p-0">
        </div>
        <div class="col-5 pl-0">
            <div class="row align-items-center pt-2 pb-2 pl-3" style="border-bottom:solid 1px #CCCCCC">
                <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle mr-3" style="width:12%">
                <span class="mr-2"><b>{{$post->user->username}}</b></span>
                <span class="mr-2">•</span>
                <a href="#" style="color:#0095F6"><b>Seguir</b></a>
            </div>
            <div class="pt-3" style="display:inline-flex;flex-direction:row">
                <div>
                    <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle" style="width:42px">
                </div>
                <div class="pl-3">
                    <span class="mr-2"><b>{{$post->user->username}}</b></span>
                    <span>{{$post->caption}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection