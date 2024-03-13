<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class PostsController extends Controller
{

    public final function index(): View
    {

        $posts = Post::all();
        return view('post.index', ["posts" => $posts]);
    }

//    public final function show(string $id): mixed
//    {
//        $post = Post::query()->findOrFail((int) $id);
//        return view('post.show', ["post" => $post]);
//    }

    public final function show(Post $post): View
    {

        return view('post.show', ["post" => $post]);
    }

    public final function create(): View
    {

        return view('post.create');

    }

    public final function edit(Post $post): View
    {

        return view('post.edit', ["post" => $post]);

    }

    public final function store(): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);

        if (Post::query()->create($data)) {
            return redirect()->route('post.index');
        }

        return redirect()->route('post.create');
    }

    /**
     * @throws Throwable
     */
    public final  function  update(Post $post) : RedirectResponse{
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);

        $post->updateOrFail($data);
        return redirect()->route('post.show', $post->id);

    }


    /**
     * @throws Throwable
     */
    public final function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('post.index');


    }



}

