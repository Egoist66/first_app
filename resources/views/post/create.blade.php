@extends('layouts.main')
@section('title')
    Create posts
@endsection

@section('content')

    <div class="create-posts">

        <form method="post" action="{{route('post.store')}}">
            @csrf
            <div class="mb-3">
                <label for="postInput" class="form-label">Enter post title</label>
                <input name="title" required type="text" class="form-control" id="postInput">
            </div>

            <div class="mb-3">
                <label for="postContent" class="form-label">Add post content</label>
                <textarea name="content" required type="text" class="form-control" id="postContent"></textarea>
            </div>

            <div class="mb-3">
                <label for="postImage" class="form-label">Insert post image URL</label>
                <input name="image" type="url" class="form-control" id="postImage">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category_id" class="form-select">
                    <option disabled selected>Choose category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ucfirst($category->title)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Choose tags</label>
                <select name="tags[]" size="3" id="tags" class="form-select" multiple>
                    @foreach($tags as $tag)
                        <option  value="{{$tag->id}}">{{ucfirst($tag->title)}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>


        </form>

    </div>

@endsection

