<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Post;

class AdminShowController extends BaseController
{

    public function __invoke(Post $post) {
        return view('admin.templates.show', ["post" => $post, "navposts" => Post::all()]);
    }
}
