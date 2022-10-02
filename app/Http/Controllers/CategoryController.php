<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('blog.category.categories', [
            "title" => "All Category",
            "categories" => $categories->toarray()
        ]);
    }

    public function show(Category $category)
    {
        return view('blog.category.category', [
            "title" => "Category",
            "category" => $category->name,
            "posts" => $category->posts->load('category')->toarray()
        ]);
    }
}
