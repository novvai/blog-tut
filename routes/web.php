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

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// [REF]
// Route::get('/posts', fn () => view('posts.index', ['blog_posts' => loadPosts()]))->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', function (Request $request) {
    $posts = loadPosts();

    $now = Carbon::now();

    $post = [
        'id' => rand(2, 99999),
        'title' => $request->get('title'),
        'author' => $request->get('author'),
        'description' => $request->get('description'),
        'created_at' => $now->toDateTimeString()
    ];

    $posts->add($post);

    savePosts($posts);

    return redirect()->route('posts.index');
})->name('posts.store');

Route::get('/posts/{post}/edit', function (int $postId) {
    $posts = loadPosts();
    $post = $posts->firstWhere('id', $postId);


    return view('posts.edit', ['post' => $post]);
})->name('posts.edit');

Route::put('/posts/{post}', function (Request $request, int $postId) {
    $posts = loadPosts();

    $post = $posts->firstWhere('id', $postId);

    $post['title'] = $request->get('title');
    $post['description'] = $request->get('description');
    $post['author'] = $request->get('author');

    $posts = $posts->map(function ($postItem) use ($post) {
        return $postItem['id'] == $post['id'] ? $post : $postItem;
    });

    savePosts($posts);

    return redirect()->route('posts.show', $postId);
})->name('posts.update');

Route::get('/posts/{post}', function (int $postId) {
    $posts = loadPosts();

    $post = $posts->firstWhere('id', $postId);

    return view('posts.show', ['post' => $post]);
})->name('posts.show');

Route::delete('/posts/{post}', function (int $postId) {
    $posts = loadPosts();

    $posts = $posts->filter(fn ($post) => $post['id'] != $postId);

    savePosts($posts);

    return redirect()->route('posts.index');
})->name('posts.destroy');


Route::resource('author', AuthorController::class);
