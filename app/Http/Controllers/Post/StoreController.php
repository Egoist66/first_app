<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request): RedirectResponse
    {

        $data = $request->validated();
        if($this->service->store($data)){

            return redirect()->route('post.index');
        }

        return redirect()->route('post.create');


    }

}

