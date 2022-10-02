@extends('dashboard/layouts.main')

@section('container')

<div class="container my-4">
    <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">    
        @csrf
        <input type="hidden" value="{{$id}}" name="user_id">
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " name="title" required="" value="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control " style="height: 100px" name="content" required=""></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Image URL</label>
            <div class="col-sm-10">
                <input type="file" class="form-control " name="image" required="" value="">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="form-select " aria-label="Default select example" name="category_id" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{$category["id"]}}">{{$category["name"]}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-auto ">
                <button type="submit" class="btn btn-primary">Create post</button>
            </div>
            <div class="col-2">
                <a href="/dashboard/posts" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form><!-- End General Form Elements -->

    
</div>
  

@endsection