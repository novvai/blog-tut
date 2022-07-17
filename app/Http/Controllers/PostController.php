<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $authors = Author::all();
        $tags = Tag::all();

        return view('posts.create', compact('authors', 'tags'));
    }

    public function show(int $postId)
    {
        $post = Post::where('id', $postId)->firstOrFail();

        return view('posts.show', ['post' => $post]);
    }

    public function edit(int $postId)
    {
        $post = Post::where('id', $postId)->first();
        $authors = Author::all();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'tags', 'authors'));
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $uploaded = false;

        if ($file) {
            // save the file 
            $extension = $file->getClientOriginalExtension();
            $name = Str::random(32) . '.' . $extension;
            $uploaded = Storage::put($name, $file->getContent());
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $post = new Post([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);

        $author = Author::where('id', $request->author)->firstOrFail();

        $post->author()->associate($author);
        $post->save();

        $post->tags()->attach($request->get('tags'));

        if ($uploaded) {
            $post->image()->updateOrCreate([], ['path' => $name]);
        }

        return redirect()->route('posts.index');
    }


    public function update(Request $request, int $postId)
    {
        $post = Post::where('id', $postId)->first();

        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $author = Author::where('id', $request->author)->firstOrFail();
        $post->author()->associate($author);

        $post->save();

        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.show', $postId);
    }

    public function destroy(int $postId)
    {
        $post = Post::where('id', $postId)->first();
        $post->delete();

        return redirect()->route('posts.index');
    }
}
