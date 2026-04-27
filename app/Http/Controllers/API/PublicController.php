<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PublicController extends Controller
{
    public function posts()
    {
        $posts = Post::with(['user', 'category'])->latest()->paginate(10);
        return response()->json($posts);
    }

    public function post($slug)
    {
        $post = Post::with(['user', 'category'])->where('slug', $slug)->firstOrFail();
        return response()->json($post);
    }

    public function categories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
