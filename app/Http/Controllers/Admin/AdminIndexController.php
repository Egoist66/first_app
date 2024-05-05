<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\FilterIndexRequest;
use Illuminate\View\View;

class AdminIndexController extends BaseController
{


    public function __invoke(FilterIndexRequest $request): View
    {

        return view('admin.index');
    }

}
