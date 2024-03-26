<?php


namespace App\Http\Controllers;

use App\Dto\PostDto;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class PostsController extends Controller
{

    public final function index(Request $request): View
    {

        $posts = Post::all();
        //$category = Category::query()->find(1);
        //$posts = Post::query()->get()->where('category_id', $category->id);
        //$post = Post::query()->find(1);
        //$tag = Tag::query()->find(1);

        //return redirect()->away('https://www.google.com');
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
        $tags = Tag::all();

        return view(
            'post.create',
            [
                "categories" => $categories,
                "tags" => $tags
            ]
        );

    }

    public final function edit(Request $request, Post $post): View
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
            'category_id' => 'string',
            'tags' => 'array'
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::query()->create($data);
        if ($post) {
            // foreach ($tags as $tag) {
            //     PostTag::query()->firstOrCreate([
            //         'tag_id' => $tag,
            //         'post_id' => $post->id
            //     ]);
            // }

            $post->tags()->attach($tags);

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

