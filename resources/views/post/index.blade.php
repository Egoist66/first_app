@extends('layouts.main')
@section('title')
    Posts
@endsection

@section('content')
    <div class="posts">
        <div class="row">
            <div class="col">
                <div class="pb-5">
                    <button class="btn create-btn btn-outline-primary">
                        <a style="text-decoration: none; color: black" href="{{route('post.create')}}">Create post</a>
                    </button>
                </div>
            </div>

        </div>
        @foreach($posts as $post)

            <div style="border: none" class="card mb-3 shadow">
                <div class="card-body">
                    <div class="mb-3">
                        @if(!$post->image)

                            <img class="img-fluid"
                                 src="https://new.cblu.ac.in/wp-content/uploads/2021/08/placeholder.jpg">

                        @else
                            <img class="img-fluid" src="{{$post->image}}">
                        @endif
                    </div>
                    <h2>{{$post->title}}</h2>
                    <p>id: {{$post->id}}</p>
                    <p><b class="bg-primary-subtle p-2">created at: {{$post->created_at}}</b></p>
                    <p><b class="bg-primary-subtle p-2">updated at: {{$post->updated_at}}</b></p>
                    <div class="row">
                        <div class="col-1">
                            <a href="{{route('post.show', $post->id)}}">Read more</a>
                        </div>
                        <div class="col-1">
                            <a href="{{route('post.edit', $post->id)}}">Edit post</a>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach


    </div>


    {{--    <div x-data="{name: ''}">--}}

    {{--        <input x-model="name" type="text">--}}
    {{--        <input x-model="name" :value="name" type="text">--}}
    {{--    </div>--}}
@endsection

