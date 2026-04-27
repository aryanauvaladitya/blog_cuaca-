<?php

namespace App\Http\Controllers\API\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->where('user_id', Auth::id())->latest()->get();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'image_url' => $request->image_url,
        ]);

        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::with('category')->where('user_id', Auth::id())->findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('user_id', Auth::id())->findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url'
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url,
        ]);

        return response()->json($post);
    }

    public function destroy($id)
    {
        Post::where('user_id', Auth::id())->findOrFail($id)->delete();
        return response()->json(['message' => 'Post deleted']);
    }
}
