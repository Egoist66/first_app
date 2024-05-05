<?php

namespace App\Services\Admin;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class AdminService
{

    final public function store(mixed $data): mixed
    {

        $title = $data['title'];

        return Post::query()->where('title', 'like', '%'.$title.'%')->first();




    }


}
