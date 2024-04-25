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
                <input value="{{request()->old('title')}}" name="title" type="text" class="form-control" id="postInput">
                @error('title')

                    <p class="text-danger p-2 mt-2 rounded">{{$message}}</p>

                @enderror
            </div>

            <div class="mb-3">
                <label for="postContent" class="form-label">Add post content</label>
                <textarea name="content" type="text" class="form-control" id="postContent">{{request()->old('content')}}</textarea>
                @error('content')

                    <p class="text-danger p-2 mt-2 rounded">{{$message}}</p>

                @enderror
            </div>

            <div class="mb-3">
                <label for="postImage" class="form-label">Insert post image URL</label>
                <input  value="{{old('image')}}" name="image" type="url" class="form-control" id="postImage">
            </div>

            @error('image')

                <p class="text-danger p-2 mt-2 rounded">{{$message}}</p>

            @enderror

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category_id" class="form-select">
                    <option disabled selected>Choose category</option>
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? "selected": ""}}

                            value="{{$category->id}}">{{ucfirst($category->title)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Choose tags</label>
                <select name="tags[]" size="3" id="tags" class="form-select" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{ucfirst($tag->title)}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>


        </form>

    </div>

@endsection

