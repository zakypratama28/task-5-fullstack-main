@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header"><b>{{ $post["title"] }}</b></h3>
                <div class="d-flex justify-content-center my-3 "><img class="w-75" src="@if ($post["image"]) {{ asset('storage/posts/'.$post["image"]) }} @else https://picsum.photos/300/200 @endif"  alt=""></div>
                <div class="card-body">
                        <p class="text-muted">By <a href="/author/{{ $post["user"]["id"] }}">{{ $post["user"]["name"] }}</a> in <a href="/category/{{ $post['category']['id'] }}">{{ $post["category"]["name"] }}</a></p>
                        {{ $post["content"] }}
                        <br>
                        <a href="/home">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
