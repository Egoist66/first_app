@extends('admin.index')
@section('admin-title')
    Search
@endsection
@section('admin-content')
    <div class="container">
        <h1 class="mt-5 mb-4">Search Results for: {{$post?->title}}</h1>

        @if(!$post)
            <h3>No results</h3>

        @else
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{$post?->image}}" class="card-img-top" alt="post-pic">
                        <div class="card-body">
                            <h5 class="card-title">{{$post?->title}}</h5>
                            <p class="card-text py-2"><b>ID:{{$post?->id}}</b></p>
                            <p class="card-text">{{$post?->content}}</p>

                            <h4><a target="_blank" href="{{route('admin.post.show', ['post' => $post->id])}}">Read
                                    more</a></h4>
                        </div>
                    </div>
                </div>
                @endif

            </div>

    </div>

@endsection
