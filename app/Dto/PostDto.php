<?php

namespace App\Dto;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;

class PostDto
{
    private Post $post;
    public string $title;
    public string|null $image;
    public string $id;
    public string $content;
    public string $category_id;
    public string $created_at;
    public string $updated_at;

    public string $like;

    //public string $category_name;

    public function __construct(Post $post)
    {
        $this->title = $post->title;
        $this->image = $post->image;
        $this->id = $post->id;
        $this->content = $post->content;
        $this->category_id = $post->category_id;
        $this->created_at = $post->created_at;
        $this->updated_at = $post->updated_at;
        $this->tags = $post->tags;
        $this->likes = $post->likes;
       // $this->category_name = $post->category->title;
    }

    final public static function adaptPosts(Collection|LazyCollection $posts): array
    {

        return $posts->map(static fn(Post $post) => new PostDto($post))->toArray();
    }
}
