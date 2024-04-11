<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends BaseController
{

    public function __invoke(): View {


        //$posts = PostDto::adaptPosts(Post::query()->with('category')->get());
        $posts = Post::paginate(10);
        //dd($posts);
        return view('post.index', ["posts" => $posts]);
    }

}

