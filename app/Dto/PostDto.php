<?php

namespace App\Dto;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostDto
{
    private Post $post;
    public string $title;
    public string $image;
    public string $id;
    public string $content;
    public string $category_id;
    public string $created_at;
    public string $updated_at;

    public function __construct(Post $post)
    {
        $this->title = $post->title;
        $this->image = $post->image;
        $this->id = $post->id;
        $this->content = $post->content;
        $this->category_id = $post->category_id;
        $this->created_at = $post->created_at;
        $this->updated_at = $post->updated_at;
    }

    final public static function adaptPosts(Collection $posts): array
    {

        return $posts->map(static fn(Post $post) => new PostDto($post))->toArray();
    }
}
