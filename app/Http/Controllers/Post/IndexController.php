<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterIndexRequest;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends BaseController
{

    public function __invoke(FilterIndexRequest $request): View {

        $data = $request->validated();

        //$posts = PostDto::adaptPosts(Post::query()->with('category')->get());


        $posts = Post::paginate(10);
        unset($posts);

        $query = Post::query();
        if(isset($data['category_id'])){
            $query->where('category_id', $data['category_id']);
        }

        if(isset($data['title'])){
            $query->where('title', 'like', '%' . $data['title'] . '%');
        }
        $posts = $query->get();
        
        dd($posts);

        return view('post.index', ["posts" => $posts]);
    }

}

