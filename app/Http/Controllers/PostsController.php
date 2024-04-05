<?php


namespace App\Http\Controllers;

use App\Dto\PostDto;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class PostsController extends Controller
{

    final public function index(Request $request): View
    {

        $post = Post::query()->find(1);
        $category = Category::query()->find(1);
        $tag = Tag::query()->find(1);
        $posts = PostDto::adaptPosts(Post::all());

        //$category = Category::query()->find(1);
        //$posts = Post::query()->get()->where('category_id', $category->id);
        //$post = Post::query()->find(1);
        //$tag = Tag::query()->find(1);

        //return redirect()->away('https://www.google.com');
        dd($post->tags);
        return view('post.index', ["posts" => $posts]);
    }

    //    public final function show(string $id): mixed
//    {
//        $post = Post::query()->findOrFail((int) $id);
//        return view('post.show', ["post" => $post]);
//    }


    final public function show(Post $post): View
    {

        return view('post.show', ["post" => new PostDto($post)]);
    }

    final public function create(): View
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

    final public function edit(Request $request, Post $post): View
    {
        $tags = Tag::all();

        $categories = Category::all();
        return view('post.edit', [
            "post" => new PostDto($post),
            "categories" => $categories,
            "tags" => $tags
        ]);

    }

    final public function store(): RedirectResponse
    {
        $data = request()?->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'string',
            'image' => 'string',
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
    final public function update(Post $post): RedirectResponse
    {
        $data = request()?->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'string',
            'tags' => 'array'
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->updateOrFail($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);

    }


    /**
     * @throws Throwable
     */
    final public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('post.index');


    }


}

