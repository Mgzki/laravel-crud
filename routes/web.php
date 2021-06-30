<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;

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

    return view('welcome');
});

Route::get('/posts', [PostsController::class,'index']);

Route::post('/posts', [PostsController::class, 'store']);

Route::get('/posts/{post:slug}/edit', [PostsController::class,'edit']);

Route::put("/posts/{post:slug}", [PostsController::class,'update']);

Route::get("/posts/create", [PostsController::class, 'create']);

Route::delete("/posts/{post:slug}", [PostsController::class, 'destroy']);

Route::get('/category/{category:slug}', [CategoryController::class, 'index']);

// Route::get('category/{category:slug}', function (Category $category){ // Category $category as parameter in controller
//     return view('posts.index', [
//         'posts' => $category->posts
//     ]);
// });