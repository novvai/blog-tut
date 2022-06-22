<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    PostController,
    TagsController,
    AuthorController
};



Route::resource('posts', PostController::class);
Route::resource('authors', AuthorController::class);
Route::resource('tags', TagsController::class);
