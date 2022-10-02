@extends('dashboard/layouts.main')

@section('container')

    <article class="my-5 p-3">
        <h3><?= $post["title"] ?></h3>
        <p class="text-muted" >Category : {{ $post["category"]["name"] }}</p>
        <img class="w-75" src="{{ asset('storage/posts/'.$post["image"]) }}" alt="">
        <p><?= $post["content"]?></p>
        
                    <a href="/dashboard/posts/{{ $post["id"] }}/edit">Edit</a>
                    <form action="/dashboard/posts/{{ $post["id"] }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent text-primary"><u> Delete </u></button>
                    </form>
    </article>

    

@endsection