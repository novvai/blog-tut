<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    PostController,
    TagsController,
    AuthorController,
    AuthenticationController
};



Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/register', [AuthenticationController::class, 'processRegister'])->name('register.process');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('posts', PostController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('tags', TagsController::class);

    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
