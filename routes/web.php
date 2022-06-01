<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/posts', function () {
    $posts = loadPosts();

    return view('posts.index', ['blog_posts' => $posts]);
})->name('posts.index');

// [REF]
// Route::get('/posts', fn () => view('posts.index', ['blog_posts' => loadPosts()]))->name('posts.index');

Route::get('/posts/create', function () {
    return view('posts.create');
})->name('posts.create');

Route::get('/posts/{post}', function (int $postId) {
    $posts = loadPosts();

    $post = $posts->firstWhere('id', $postId);

    return view('posts.show', ['post' => $post]);
})->name('posts.show');



// // Route::post
// // Route::get()
// // Route::put
// Route::patch
// Route:delete