<?php

use Illuminate\Support\Facades\Route;

$posts = [
    [
        "id" => 1,
        "title" => "Holywood",
        "created_at" => "2021-03-03 11:20:33",
        "description" => "The movie town",
        "author" => "John doe"
    ], [
        "id" => 2,
        "title" => "Johny Depp, Pirates",
        "created_at" => "2021-10-03 12:16:23",
        "description" => "The movie town",
        "author" => "John doe"
    ]
];


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

Route::get('/', function () use ($posts) {
    return view('posts.listing', ['blog_posts' => $posts]);
});

Route::get('/post/{id}', function ($id) use ($posts) {
    $current_post = [];
    foreach ($posts as $post) {
        if ($post['id'] == $id) {
            $current_post = $post;
            break;
        }
    }
    return view('posts.single', ['post' => $current_post]);
});

Route::get('/post/{id}/user/{author}/{date}', function ($id, $author, $date) use ($posts) {
    dd($id, $author, $date);
});


Route::get('/users/{id}/{blog_id?}', function ($id, $blog_id = null) use ($posts) {
    dd($id, $blog_id);
});


// Route::post
// Route::get()
// Route::put
// Route::patch
// Route:delete