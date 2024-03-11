<?php



namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use PhpParser\Builder;

class PostsController extends Controller
{

    public final function index(): View
    {
        //$post = Post::query()->find(1);
        //$posts = Post::all()->where('is_published', 1);
        //$posts = Post::all()->where('is_published', 1)->first();

        $posts = Post::all();
        //dump(compact('posts'));
        return view('post.index', ["posts" => $posts]);
    }

    public final function get(string $id): Builder|Model|null | string
    {
        if (Post::query()->find((int)$id)) {
            return Post::query()->find((int)$id);
        }
        return 'No such post';
    }

    public final function create(): View
    {
//        $postsArr = [
//            [
//
//                'title' => 'new post laravel',
//                'content' => 'some super code',
//                'image' => 'image34',
//                'likes' => 12,
//                'is_published' => 1
//
//            ],
//            [
//
//                'title' => 'new post laravel2',
//                'content' => 'some super code2',
//                'image' => 'image35',
//                'likes' => 15,
//                'is_published' => 1
//
//            ]
//        ];
//
//        foreach ($postsArr as $post) {
//
//            Post::query()->create($post);
//        }

        return view('post.create');

    }

    public final function update(): void
    {

        $post = Post::query()->find(1);
        $post->update(['title' => 'bitch']);


    }

    public final function delete(): mixed
    {
        //return Post::query()->find(1)->delete();
        return Post::query()->where('id', 1)->forceDelete();

    }

    public final function deletePostById(string $id): mixed {
        return  Post::query()->find((int) $id)->delete();
    }

    public final function restorePostById(string $id): mixed {
        return Post::withTrashed()->where('id', $id)->restore();
    }

    public final function firstOrCreate(): mixed
    {
        $post = Post::query()->find(2);
        $anotherPost = [

            'title' => 'some post new2024',
            'content' => 'hello new post 2024',
            'image' => 'image11111111',
            'likes' => 25,
            'is_published' => 1

        ];

        return Post::query()->firstOrCreate([
            'title' => 'some post new2024'
        ], $anotherPost);
    }

    public final function updateOrCreate(): mixed
    {
        $anotherPost = [

            'title' => 'some post code9',
            'content' => 'update or create hello new post',
            'image' => 'update or create image',
            'likes' => 35,
            'is_published' => 1

        ];

        return Post::query()->updateOrCreate(['title' => 'some post code999'],
            $anotherPost
        );


    }


}

//function sum(...$args){
//    return array_reduce($args, fn(mixed $prev , mixed $next) => (
//        $prev + $next
//    ));
//}
//
//dump(sum(1, 2, 3, 4, 5));
