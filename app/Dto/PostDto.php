<?php

namespace App\Dto;

use App\Models\Post;

class PostDto
{
    private Post $post;
    public string $title;
    public string $image;
    public string $id;
    public string $content;

    public function __construct(Post $post)
    {
        $this->title = $post->title;
        $this->image = $post->image;
        $this->id = $post->id;
        $this->content = $post->content;
    }
}
