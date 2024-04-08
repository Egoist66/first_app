<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {

        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('post.show', $post->id);

    }

}

