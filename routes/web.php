<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {

    // DB::listen(function ($query){
    //     logger($query->sql);
    // });

    // return view('posts.index', [
    //     'category' => Category::all(),
    //     'posts' => Post::with('category','author')->orderByDesc('created_at')->filter(request(['search','category','author']))->get(),
    // ]);
    return redirect('/posts');
});
Route::get('/posts', [PostsController::class, 'index'])->name('home');
Route::post('/posts', [PostsController::class, 'store']);
Route::get("/posts/create", [PostsController::class, 'create']);
Route::get('/posts/{post:slug}/edit', [PostsController::class, 'edit']);
Route::patch("/posts/{post:slug}", [PostsController::class, 'update']);
Route::get("/posts/{post:slug}", [PostsController::class, 'show']);

Route::delete("/posts/{post:slug}", [PostsController::class, 'destroy']);

Route::post('newsletter', NewsletterController::class);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest'); //middleware is logic that runs whenever a new request comes in
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Route::get('/category/{category:slug}', [CategoryController::class, 'index']);
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts.index', [
//         'posts' => $author->posts->load(['category', 'author']),
//         'category' => Category::all()
//     ]);
// });
// Route::get('category/{category:slug}', function (Category $category){ // Category $category as parameter in controller
//     return view('posts.index', [
//         'posts' => $category->posts
//     ]);
// });