<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', 
        [
            // 'posts' => Post::with('category','author')->orderByDesc('created_at')->filter(request(['search']))->get(),
            // for if you want to let the filter handle categories as well
            // changes URL from /category/slug to query=category
            'posts' => 
                Post::with('category','author')
                    ->orderByDesc('created_at')
                    ->filter(request(['search','category','author']))
                    ->paginate(6)
                    ->withQueryString(), //lets you maintain queries when switching pages
            // category is passed through every time, but it's only used in the category dropdown
            // can remove if you extract category dropdown to a component and pass the category stuff CategoryDropdown.php
            // which renders category-dropdown.blade.php
            // 'category' => Category::all(),
            // handles passing selected category for the category search highlighting in header
            // 'currentCategory' => Category::firstWhere('slug', request('category'))
            // put currentCategory in the category dropdown component also
        ]); //how to pass data to views
        
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        if (Gate::allows('admin-only', Auth::user())){
            return view('posts.create',[
                'categories' => Category::all()
            ]);
        } else {
            abort(403);
        }
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
            'thumbnail' => 'required|image',
            'content' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')],
        ]);

        Post::create([
            'title' => request('title'),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
            'content' => request('content'),
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', request('title')))),
            'user_id' => Auth::user()->id,
            'category_id' => request('category_id'),
        ]);

        // $attributes = request()->validate([
        //     'title' => request('title'),
        //     'content' => request('content'),
        //     'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', request('title')))),
        //     'category_id' => request('category_id'),
        // ]);

        // $attributes['user_id'] = Auth::user()->id;
        // $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        // Post::create($attributes);




        // Post::create(request()->validate([
        //     'title' => 'required|unique:posts,title',
        //     'content' => 'required',
        // ]) + ['slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', request('title'))))]);

        return redirect('/posts')->withSuccess('Post created successfully!');
    }

    public function edit(Post $post)
    {
        if (Gate::allows('admin-only', Auth::user())){
            return view('posts.edit',['post' => $post]);
        } else {
            abort(403);
        }
        return view('posts.edit',['post' => $post]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if (Gate::allows('admin-only', Auth::user())){
            $post->update([
                'title' => request('title'),
                'content' => request('content'),
            ]);
            return redirect('/posts');
        } else {
            abort(403);
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
