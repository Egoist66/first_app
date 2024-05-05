<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\AdminSearchRequest;
use Illuminate\View\View;

class AdminSearchController extends BaseController
{

    public function __invoke(AdminSearchRequest $request): View{

        $data = $request->validated();

        $post = $this->service->store($data);
        return view('admin.templates.search', ['post' => $post]);


    }

}
