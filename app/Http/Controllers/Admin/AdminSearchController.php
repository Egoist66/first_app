<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminSearchRequest;
use App\Models\Post;

class AdminSearchController extends BaseController
{

    public function __invoke(AdminSearchRequest $request){

        $data = $request->validated();

        $post = $this->service->store($data);
        return view('admin.templates.search', ['post' => $post]);


    }

}
