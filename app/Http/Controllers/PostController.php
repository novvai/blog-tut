<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:update,post', [
            'only' => ['edit']
        ]);
    }

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
        // Gate::authorize('create-post', ['category', 'test']);

        // if (Gate::none(['create-post', 'superuser'])) {
        //     abort(403);
        // }
        $authors = Author::all();
        $tags = Tag::all();
        return view('posts.create', compact('authors', 'tags'));
    }

    public function show(int $postId)
    {
        $post = Post::where('id', $postId)->firstOrFail();
        // Gate::allowIf(fn ($user) => $user->isWriter());

        return view('posts.show', ['post' => $post]);
    }

    public function edit(Request $request, Post $post)
    {
        // dd($post);
        // $post = Post::where('id', $postId)->first();
        // $response = Gate::inspect('update-post-msg', $post);
        // if (!$response->allowed()) {
        //     abort(403, $response->message());
        // }
        // Gate::authorize('update', $post);
        // if (!$request->user()->can('udapte', $post)) {
        // if ($request->user()->cannot('udapte', $post)) {
        //     abort(403);
        // }
        // $this->authorize('upate', $post);


        $authors = Author::all();
        $tags = Tag::all();

        return view('posts.edit', ['post' => $post, 'authors' => $authors, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        // if (Gate::denies('create-post')) {
        //     abort(403);
        // }
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
            'user_id' => $request->user()->id
        ]);
        $author = Author::where('id', $request->author)->firstOrFail();

        $post->author()->associate($author);
        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index');
    }


    public function update(Request $request, int $postId)
    {
        $post = Post::where('id', $postId)->first();

        if (Gate::denies('update', $post)) {
            abort(404);
        }

        $file = $request->file('image');
        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $name = Str::random(32) . '.' . $ext;

            // dd(Storage::exists($post->image->path), $post->image->path);

            $uploaded = Storage::put($name, $file->getContent());


            if ($uploaded) {
                $post->image()->updateOrCreate([], ['path' => $name]);
            }
        }

        $post->title = $request->get('title');
        $post->description = $request->get('description');

        $author = Author::where('id', $request->author)->firstOrFail();

        $post->author()->associate($author);
        $post->tags()->attach($request->get('tags'));

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
