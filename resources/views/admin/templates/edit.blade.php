@extends('admin.index')
@section('admin-title')
    Edit post
@endsection

@section('admin-content')

    <div class="edit-post">

        <form method="post" action="{{route('admin.post.update', $post?->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="postInput" class="form-label">Edit post title</label>
                <input value="{{$post?->title}}" name="title" type="text" class="form-control" id="postInput">
            </div>

            <div x-data="{postContent: '{{$post?->content}}'}" class="mb-3">
                <label for="postContent" class="form-label">Change post content</label>
                <textarea x-html="postContent" name="content" type="text" class="form-control"
                          id="postContent"></textarea>
            </div>

            <div class="mb-3">
                <label for="postImage" class="form-label">Update post image URL</label>
                <input value="{{$post?->image}}" name="image" type="url" class="form-control" id="postImage">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category_id" class="form-select">

                    @foreach($categories as $category)

                        <option
                            {{(int) $category->id === (int)$post->category_id ? "selected": ""}} value="{{$category->id}}">{{ucfirst($category->title)}}</option>
                    @endforeach
                </select>

                <div class="mb-3">
                    <label for="tags" class="form-label">Choose tags</label>
                    <select name="tags[]" size="3" id="tags" class="form-select" multiple>
                        @foreach($tags as $tag)
                            <option
                                @foreach($post->tags as $postTag)
                                    {{(int) $tag->id === (int)$postTag->id ? "selected": ""}}

                                @endforeach
                                value="{{$tag->id}}">{{ucfirst($tag->title)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="pb-3">
                <button type="submit" class="btn btn-primary">Update post</button>

            </div>

        </form>

    </div>

@endsection

