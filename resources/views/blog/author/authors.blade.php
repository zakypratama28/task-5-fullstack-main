@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header"><b>Author list</b></h3>

                <div class="card-body">
                    <div class="list-group">
                        @foreach ($authors as $author)
                            <a href="/author/{{ $author["id"] }}" class="list-group-item list-group-item-action">
                                {{ $author["name"] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
