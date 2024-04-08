<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class CreateController extends BaseController
{

    public function __invoke(): View {


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

}

