<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCreateController extends BaseController
{


    public function __invoke(Request $request, Post $post): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view(
            'admin.templates.create',
            [
                "categories" => $categories,
                "tags" => $tags
            ]
        );
    }

}
