<?php

namespace App\Http\Controllers\Admin\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminEditController extends BaseController
{


    public function __invoke(Request $request, Post $post): View
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.templates.edit', [
            "post" => new PostDto($post),
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

}
