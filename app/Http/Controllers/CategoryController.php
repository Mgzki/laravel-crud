<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category) 
    {
        // $category = Category::first(); // dont need this, slap the 'Category $category' as parameter

        return view('posts.index', [
            'posts' => $category->posts->load(['category', 'author']),
            'currentCategory' => $category,
            'category' => Category::all()
        ]); //how to pass data to views
        // return view('posts.index')-> with('posts', $posts);
        
    }
}