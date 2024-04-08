<?php


namespace App\Http\Controllers\Post;

use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DestroyController extends BaseController
{

    public function __invoke(Post $post): RedirectResponse {

        $post->delete();
        return redirect()->route('post.index');
    }

}

