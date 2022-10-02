@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <h3 class="card-header text-center"><b>Category : {{ $category }}</b></h3>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <h5 class="card-header" style="height:60px;"><b>{{ $post["title"] }}</b></h5>
                    <div class="d-flex justify-content-center" style="width:100%; height: auto;"><img class="w-75" src="@if ($post["image"]) {{ asset('storage/posts/'.$post["image"]) }} @else https://picsum.photos/300/200 @endif" alt=""></div>
                    <div class="card-body">
                        <p class="text-muted">By <a href="/author/{{ $post["user"]["id"] }}">{{ $post["user"]["name"] }}</a> in <a href="/category/{{ $post['category']['id'] }}">{{ $post["category"]["name"] }}</a></p>
                        {{ substr($post["content"],0,300) . " ..." }}   
                        <br>
                        <a href="/posts/{{ $post["id"] }}">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
