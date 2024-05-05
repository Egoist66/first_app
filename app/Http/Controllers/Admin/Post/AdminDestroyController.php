<?php


namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class AdminDestroyController extends BaseController
{

    public function __invoke(Post $post): RedirectResponse {

        $post->delete();
        return redirect()->route('admin.index');
    }

}

