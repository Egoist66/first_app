<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterIndexRequest;
use App\Models\Post;

class AdminIndexController extends BaseController
{


    public function __invoke(FilterIndexRequest $request)
    {

        return view('admin.index');
    }

}
