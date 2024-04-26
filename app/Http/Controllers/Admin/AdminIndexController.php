<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterIndexRequest;
use App\Models\Post;

class AdminIndexController extends BaseController
{


    public function __invoke(FilterIndexRequest $request)
    {

        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $navposts = Post::filter($filter)->paginate(10);
        $posts = Post::filter($filter)->get();

        return view('admin.index', ["posts" => $posts, "navposts" => $navposts]);
    }

}
