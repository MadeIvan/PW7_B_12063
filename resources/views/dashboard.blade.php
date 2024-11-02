<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>PW7_B_12063</title> 
    <!-- Google Font: Source Sans Pro --> 
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> 
    <!-- Font Awesome Icons --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> 
    <!-- Theme style --> 
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}"> 
    <!-- Boostrap 5 --> 
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous"> 
    <!-- Bootstrap Icons --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.18.0/font/bootstrap-icons.css"> 
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"> 
            <!-- Left navbar links --> 
            <ul class="navbar-nav"> 
                <li class="nav-item"> 
                    <a class="nav-link" data-widget="pushmenu" href="#"role="button"> 
                        <i class="fas fa-bars"></i> 
                    </a> 
                </li> 
            </ul> 
            <!-- Right navbar links --> 
            <ul class="navbar-nav ml-auto"> 
                <li class="nav-item"> 
                    <a class="nav-link" data-widget="fullscreen" 
                    href="#" role="button"> 
                        <i class="fas fa-expand-arrows-alt"></i> 
                    </a> 
                </li> 
            </ul> 
        </nav> 
        <!-- /.navbar --> 
        <!-- Main Sidebar Container --> 
        <aside class="main-sidebar sidebar-dark-primary elevation-4"> 
            <!-- Brand Logo --> 
            <a href="#" class="brand-link"> 
                <img src=" {{ asset('img/AdminLTELogo.png') }}" 
                    alt="AdminLTE Logo" class="brand-image img-circle elevation3" 
                    style="opacity: .8"> 
                <span class="brand-text font-weight-light">Perpus gacor</span> 
            </a> 
            <!-- Sidebar --> 
            <div class="sidebar"> 
                <!-- Sidebar Menu --> 
                <nav class="mt-2"> 
                    <ul class="nav nav-pills nav-sidebar flex-column" 
                    data-widget="treeview" role="menu" data-accordion="false"> 
                        <li class="nav-item"> 
                            <a href="{{ url('book') }}" 
                                class="nav-link"> 
                                <i class="fa-solid fa-film"></i> 
                                <p> Book</p> 
                            </a> 
                        </li>   
                        <li class="nav-item"> 
                            <a href="{{ url('bookings') }}" 
                                class="nav-link"> 
                                <i class="fa-solid fa-ticket"></i> 
                                <p> Bookings</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ url('customer') }}" 
                                class="nav-link"> 
                                <i class="fas fa-user-alt"></i> 
                                <p> Customer</p>
                            </a> 
                        </li>
                        </ul> 
                </nav> 
            <!-- /.sidebar-menu --> 
            </div> 
        <!-- /.sidebar --> 
        </aside> 
        <!-- Content Wrapper. Contains page content --> 
        <div class="content-wrapper"> 
            @yield('content') 
        </div>
        <!-- /.content-wrapper --> 
        <!-- Main Footer --> 
        <footer class="main-footer"> 
            <!-- To the right --> 
            <div class="float-right d-none d-sm-inline">PW7_B_12063
            </div>
            <!-- Default to the left --> 
            <strong>Copyright &copy; {{ date('Y') }} <a 
                href="#">AdminLTE.io</a>. </strong> All rights reserved. 
        </footer> 
    </div> 
    <!-- ./wrapper --> 
    <!-- REQUIRED SCRIPTS --> 
    <!-- jQuery --> 
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> 
    <!-- Bootstrap 5 --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script> 
    <!-- AdminLTE App --> 
    <script src="{{ asset('js/adminlte.min.js') }}"></script> 
</body> 
</html>