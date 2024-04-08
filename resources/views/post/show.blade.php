@extends('layouts.main')
@section('title')
    Post - {{$post->title}}
@endsection
@section('content')
    <div class="card-body card">
        <div class="mb-3">
            @if(!$post->image)
                <img class="img-fluid" src="https://new.cblu.ac.in/wp-content/uploads/2021/08/placeholder.jpg">
            @else
                <img class="img-fluid" src="{{$post->image}}">
            @endif
        </div>
        <h2>{{$post->title}}</h2>
        <p>id: {{$post->id}}</p>
        <p>description: {{$post->content}}</p>
        <div class="row mb-5">
            <div class="col-2">
                <a class="link-primary" href="{{route('post.index')}}">Back to insights</a>
            </div>

            <div class="col-2">
                <a class="link-primary" href="{{route('post.edit', $post->id)}}">Edit post</a>
            </div>

        </div>

        <div>
            <form method="post" action="{{route('post.destroy', $post->id)}}">
                @method('delete')
                @csrf

                <button class="btn btn-outline-danger" href="">Delete post</button>


            </form>
        </div>
    </div>
@endsection


