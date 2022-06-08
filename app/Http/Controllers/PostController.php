<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Visualises all posts
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['blog_posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(int $postId)
    {
        $post = Post::where('id', $postId)->firstOrFail();

        return view('posts.show', ['post' => $post]);
    }

    public function edit(int $postId)
    {

        $post = Post::where('id', $postId)->first();


        return view('posts.edit', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'author' => 'required|min:2',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $post = new Post([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'description' => $request->get('description'),
        ]);

        $post->save();

        return redirect()->route('posts.index');
    }


    public function update(Request $request, int $postId)
    {
        $post = Post::where('id', $postId)->first();


        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->author = $request->get('author');

        $post->save();

        return redirect()->route('posts.show', $postId);
    }

    public function destroy(int $postId)
    {
        $post = Post::where('id', $postId)->first();
        $post->delete();

        return redirect()->route('posts.index');
    }
}
