@extends('layouts.main')
@section('title')
    Edit post
@endsection

@section('content')

    <div class="edit-post">

        <form method="post" action="{{route('post.update', $post->id)}}">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="postInput" class="form-label">Edit post title</label>
                <input value="{{$post->title}}" name="title" type="text" class="form-control" id="postInput">
            </div>

            <div x-data="{postContent: '{{$post->content}}'}" class="mb-3">
                <label for="postContent" class="form-label">Change post content</label>
                <textarea x-html="postContent" name="content" type="text" class="form-control"
                          id="postContent"></textarea>
            </div>

            <div class="mb-3">
                <label for="postImage" class="form-label">Update post image URL</label>
                <input value="{{$post->image}}" name="image" type="url" class="form-control" id="postImage">
            </div>

            <button type="submit" class="btn btn-primary">Update post</button>


        </form>

    </div>

@endsection

