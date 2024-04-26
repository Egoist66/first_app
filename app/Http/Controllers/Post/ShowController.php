<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Models\Post;
use Illuminate\View\View;

class ShowController extends BaseController
{

    public function __invoke(Post $post): View {


        return view('post.show', ["post" => new PostDto($post)]);

    }

}

