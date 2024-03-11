@extends('layouts.main')
@section('title')
 Posts
@endsection

@section('content')
    <div class="posts">

        @foreach($posts as $post)

            <div style="border: none" class="card mb-3 shadow">
               <div class="card-body">
                   <h2>title: {{$post->title}}</h2>
                   <p>id: {{$post->id}}</p>
                   <p>description: {{$post->description}}</p>
                   <p><b>data: {{$post->created_at}}</b></p>
                   <div>
                       <a href="/posts/{{$post->id}}">Read more</a>
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

