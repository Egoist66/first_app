<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        * {
            font-family: Arial, serif;
        }

        .post-item {
            background: darkcyan;
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

    </style>

    @vite([
        'resources/sass/app.scss',
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body>


@include('parts.header')


<main class="mt-5 mb-5">
    <div class="container">
        @yield('content')
    </div>
</main>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
