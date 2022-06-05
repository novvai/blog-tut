<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Visualises all posts
     */
    public function index()
    {
        $posts = $this->loadPosts();

        return view('posts.index', ['blog_posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }


    /**
     * Loads posts from "DB"
     */
    private function loadPosts()
    {
        $string_posts = file_get_contents(storage_path('posts.json'));
        $posts = json_decode($string_posts, true);

        return collect($posts);
    }

    /**
     * Saves posts to "DB"
     */
    private function savePosts($posts): void
    {
        $json_posts = json_encode($posts);
        file_put_contents(storage_path('posts.json'), $json_posts);
    }
}
