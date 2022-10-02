<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $author = User::all();
        return view('blog.author.authors', [
            "title" => "All Author",
            "authors" => $author->toarray()
        ]);
    }

    public function show(User $user)
    {
        return view('blog.author.author', [
            "title" => "Author Post",
            "author" => $user->name,
            "posts" => $user->posts->load('category')->toarray()
        ]);
    }
}
