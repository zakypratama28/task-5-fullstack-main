@extends('dashboard/layouts.main')

@section('container')

<div class="row ">
    <div class="col-lg-6 mt-3">
      <h2 class="">Post List</h2>
      <a href="/dashboard/posts/create"><div class="btn btn-primary">Create</div></a>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
                
                    
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                
                
            </thead>
            <tbody>
            @foreach ($posts as $post)
              <tr>
                <td scope="col">{{ $loop->iteration }}</td>
                <td scope="col">{{ $post["title"] }}</td>
                <td scope="col">{{ $post["category"]["name"] }}</td>
                <td scope="col">
                    <a href="/dashboard/posts/{{ $post["id"] }}">View</a>
                    <a href="/dashboard/posts/{{ $post["id"] }}/edit">Edit</a>
                    <form action="/dashboard/posts/{{ $post["id"] }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent text-primary"><u> Delete </u></button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
 

@endsection