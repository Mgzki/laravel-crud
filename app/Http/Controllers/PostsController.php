<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();

        return view('posts.index', ['posts' => $posts]); //how to pass data to views
        // return view('posts.index')-> with('posts', $posts);
        
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post' => $post]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        //sends you back to the posts page once a post is updated
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
