<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return response()->json(['posts' => PostResource::collection($posts)], 200);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;
        Post::create($validateData);
        return response()->json(['msg' => 'Product Created Successfully'], 200);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        return response()->json(['post' => new PostResource($post)], 200);
    }

    public function edit()
    {
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required'
        ];

        $validateData = $request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;

        Post::where('id', $post->id)->update($validateData);

        return response()->json(['msg' => 'Product Updated Successfully'], 200);
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return response()->json(['msg' => 'Product Deleted Successfully'], 200);
    }
}
