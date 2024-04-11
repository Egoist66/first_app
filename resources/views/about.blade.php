@extends('layouts.main')
@section('title')
    About
@endsection




@section('content')
    <div>
        about page
    </div>

    <details>
        <summary style="background: red; padding: 10px"> About </summary>
        <p @style([
            'color : white',
            'padding : 10px',
            'background : black' => 2 > 1
        ])> This is my first Laravel app </p>


    </details>

    <script>
        const app = {{Js::from($_SERVER)}};
        console.log(app);
    </script>
@endsection
