<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;

function loadPosts()
{
    $string_posts = file_get_contents(storage_path('posts.json'));
    $posts = json_decode($string_posts, true);

    return collect($posts);
}

function savePosts($posts): void
{
    $json_posts = json_encode($posts);
    file_put_contents(storage_path('posts.json'), $json_posts);
}


// [REF]
// function loadPostsOptimised()
// {
//     return json_decode(file_get_contents(storage_path('posts.json')), true);
// }

// $posts = [
//     [
//         "id" => 1,
//         "title" => "Holywood",
//         "created_at" => "2021-03-03 11:20:33",
//         "description" => "The movie town",
//         "author" => "John doe"
//     ], [
//         "id" => 2,
//         "title" => "Johny Depp, Pirates",
//         "created_at" => "2021-10-03 12:16:23",
//         "description" => "The movie town",
//         "author" => "John doe"
//     ]
// ];


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

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// // [REF]
// // Route::get('/posts', fn () => view('posts.index', ['blog_posts' => loadPosts()]))->name('posts.index');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::resource('posts', PostController::class);
Route::resource('authors', AuthorController::class);
