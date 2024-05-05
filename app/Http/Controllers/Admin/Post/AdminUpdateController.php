<?php


namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class AdminUpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {

        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('admin.post.show', $post->id);

    }

}

