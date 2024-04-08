<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditController extends BaseController
{

    public function __invoke(Request $request, Post $post): View {


        $tags = Tag::all();

        $categories = Category::all();
        return view('post.edit', [
            "post" => new PostDto($post),
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

}

