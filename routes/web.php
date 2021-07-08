<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;

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
Route::get('/posts', [PostsController::class,'index'])->name('home');
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{post:slug}/edit', [PostsController::class,'edit']);
Route::put("/posts/{post:slug}", [PostsController::class,'update']);
Route::get("/posts/{post:slug}", [PostsController::class,'show']);
Route::get("/posts/create", [PostsController::class, 'create']);
Route::delete("/posts/{post:slug}", [PostsController::class, 'destroy']);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

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