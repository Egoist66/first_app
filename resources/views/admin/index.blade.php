<!DOCTYPE html>
<html lang="en">


<!-- Head -->

@includeIf('admin.meta.head')

<!-- /Head -->


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
             width="60">
    </div>

    <!-- Navbar -->

    @includeIf('admin.parts.navbar')

    <!-- /Navbar -->

    <!-- Main Sidebar Container -->

    @includeIf('admin.parts.sidebar')

    <!-- /Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class=mt-5">
                    <div class="card welcome-card">
                        <div class="card-header">
                            Welcome to the Admin Panel
                        </div>
                        <div class="card-body">
                            <p class="card-text">Hello, Admin! This is your dashboard.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="pb-5">
                            @if(request()->url() === route('admin.index'))
                                <button class="btn create-btn btn-outline-primary">
                                    <a style="text-decoration: none" href="{{ route('admin.post.create') }}">Create post</a>
                                </button>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @yield('admin-content')
            </div>
        </section>
        <!-- /Main content -->


    </div>
    <!-- /Content-wrapper -->


    <!-- Footer -->

    @includeIf('admin.parts.footer')

    <!-- /Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>


<!-- Scripts -->

@includeIf('admin.meta.script')

<!-- /Scripts -->
</body>
</html>
