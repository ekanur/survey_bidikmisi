<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Survey Bidik Misi</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/now-ui-dashboard.css?v=1.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
    @stack("style")
</head>

<body class="">
        <div class="wrapper ">
            <div class="sidebar" data-color="orange">
                <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
                <div class="logo">
                    <a href="" class="simple-text logo-mini">
                        
                    </a>
                    <a href="" class="simple-text logo-normal">
                        Survey Bidik Misi
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <!-- <li>
                            <a href="dashboard.html">
                                <i class="now-ui-icons design_app"></i>
                                <p>Dashboard</p>
                            </a>
                        </li> -->
                        <li class="active">
                            <a href="{{ url("/") }}">
                                <i class="now-ui-icons education_atom"></i>
                                <p>Survey</p>
                            </a>
                        </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                            <a class="navbar-brand" href="#pablo">@if(isset($detail_calon_penerima[0]->cmhs_nm)) Survey "{{$detail_calon_penerima[0]->cmhs_nm}}" @endif</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <!-- <form>
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </span>
                                </div>
                            </form> -->
                            <ul class="navbar-nav">
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#pablo">
                                        <i class="now-ui-icons media-2_sound-wave"></i>
                                        <p>
                                            <span class="d-lg-none d-md-block">Stats</span>
                                        </p>
                                    </a>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="now-ui-icons users_single-02"></i>
                                        {{ session('userID') }}
                                        <p>
                                            <span class="d-lg-none d-md-block">User</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ url("/servicelogout") }}">Logout</a>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            <!-- End Navbar -->

                @yield('content')
                
            <footer class="footer">
                <div class="container-fluid">

                </div>
            </footer>
        </div>
    </div>
    @stack("modal")
</body>
<!--   Core JS Files   -->
<script src="{{ asset("js/core/jquery.min.js") }}"></script>
<script src="{{ asset("js/core/popper.min.js") }}"></script>
<script src="{{ asset("js/core/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/plugins/perfect-scrollbar.jquery.min.js") }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset("js/plugins/chartjs.min.js") }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset("js/plugins/bootstrap-notify.js") }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset("js/now-ui-dashboard.js?v=1.0.1") }}"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset("demo/demo.js") }}"></script>
@stack("script")

</html>
