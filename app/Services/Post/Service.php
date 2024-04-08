<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{

    final public function store(mixed $data): bool
    {

        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::query()->create($data);

        if ($post) {
            // foreach ($tags as $tag) {
            //     PostTag::query()->firstOrCreate([
            //         'tag_id' => $tag,
            //         'post_id' => $post->id
            //     ]);
            // }

            $post->tags()->attach($tags);
            return true;


        }
        return false;


    }

    final public function update(Post $post, mixed $data): void
    {


        $tags = $data['tags'];
        unset($data['tags']);

        $post->updateOrFail($data);
        $post->tags()->sync($tags);

    }
}
