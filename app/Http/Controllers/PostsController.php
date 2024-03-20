<?php


namespace App\Http\Controllers;

use App\Dto\PostDto;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class PostsController extends Controller
{

    public final function index(): View
    {

        $posts = Post::all();
        //$category = Category::query()->find(1);
        //$posts = Post::query()->get()->where('category_id', $category->id);
        //$post = Post::query()->find(1);
        //$tag = Tag::query()->find(1);


        return view('post.index', ["posts" => $posts]);
    }

//    public final function show(string $id): mixed
//    {
//        $post = Post::query()->findOrFail((int) $id);
//        return view('post.show', ["post" => $post]);
//    }


    public final function show(Post $post): View
    {

        return view('post.show', ["post" => new PostDto($post)]);
    }

    public final function create(): View
    {
        $categories = Category::all();

        return view('post.create', ["categories" => $categories]);

    }

    public final function edit(Post $post): View
    {
        $categories = Category::all();
        return view('post.edit', [
            "post" => new PostDto($post),
            "categories" => $categories
        ]);

    }

    public final function store(): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'string'
        ]);

        if (Post::query()->create($data)) {
            return redirect()->route('post.index');
        }

        return redirect()->route('post.create');
    }

    /**
     * @throws Throwable
     */
    public final function update(Post $post): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'string'
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

