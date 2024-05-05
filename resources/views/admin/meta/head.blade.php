<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE | @yield('admin-title', 'Dashboard')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')}}">
    <style>
        .create-btn:hover a {
            color: white;
        }
    </style>
    @vite([
       'public/plugins/jquery/jquery.min.js',
       'public/plugins/jquery-ui/jquery-ui.min.js',
       'public/plugins/bootstrap/js/bootstrap.bundle.min.js',
       'public/plugins/chart.js/Chart.min.js',
       'public/plugins/sparklines/sparkline.js',
       'public/plugins/jqvmap/jquery.vmap.min.js',
       'public/plugins/jqvmap/maps/jquery.vmap.usa.js',
       'public/plugins/jquery-knob/jquery.knob.min.js',
       'public/plugins/summernote/summernote-bs4.min.js',
       'public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
       'public/dist/js/adminlte.min.js',
       'public/dist/js/demo.js',
       'public/plugins/fontawesome-free/css/all.min.css',
       'public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
       'public/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
       'public/plugins/jqvmap/jqvmap.min.css',
       'public/dist/css/adminlte.min.css',
       'public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
       'public/plugins/summernote/summernote-bs4.min.css',


   ])
</head>
