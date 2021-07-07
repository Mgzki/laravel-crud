<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
// use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', 
        [
            'posts' => Post::with('category','author')->orderByDesc('created_at')->filter(request(['search']))->get(),
            'category' => Category::all()
        ]); //how to pass data to views
        // return view('posts.index')-> with('posts', $posts);
        
    }

    public function show(Post $post)
    {
        return view('posts.post', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // Validator::make(request()->all(), [
        //     'title' => 'required|unique:posts,title',
        //     'content' => 'required',
        // ], [
        //     'title.required' => 'David is not cool', 
        // ])->validate();

        request()->validate([
            'title' => 'required|unique:posts,title',
            'content' => 'required',
        ]);

        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', request('title')))),
            'user_id' => 1,
            'category_id' => 1,
        ]);

        // Post::create(request()->validate([
        //     'title' => 'required|unique:posts,title',
        //     'content' => 'required',
        // ]) + ['slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', request('title'))))]);

        return redirect('/posts')->withSuccess('Post created successfully!');
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
