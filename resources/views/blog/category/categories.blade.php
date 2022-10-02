@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header"><b>Category list</b></h3>

                <div class="card-body">
                    <div class="list-group">
                        @foreach ($categories as $category)
                            <a href="/category/{{ $category["id"] }}" class="list-group-item list-group-item-action">
                                {{ $category["name"] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
