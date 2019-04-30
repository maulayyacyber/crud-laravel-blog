<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store()
    {
        Post::create([
            'title'         => request('title'),
            'slug'          => str_slug(request('title')),
            'category_id'   => request('category_id'),
            'content'       => request('content'),
        ]);
        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post/edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $post->update([
            'title'         => request('title'),
            'slug'          => str_slug(request('title')),
            'category_id'   => request('category_id'),
            'content'       => request('content'),
        ]);

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
