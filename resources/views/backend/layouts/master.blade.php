<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ArrowSoft</title>


    {{-- Data Tables  --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{asset('/backend')}}/../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->

    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
      rel="stylesheet"
      href="{{asset('/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet" 
      href="{{asset('/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/backend')}}/dist/css/adminlte.min.css" /> 
       <!-- overlayScrollbars -->
    <link
      rel="stylesheet" 
      href="{{asset('/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/summernote/summernote-bs4.min.css" />
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div
        class="preloader flex-column justify-content-center align-items-center"
      >
        <img
          class="animation__shake"
          src="dist/img/AdminLTELogo.png"
          alt="AdminLTELogo"
          height="60"
          width="60"
        />
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <span style="text-transform: uppercase" >{{((Auth::user()->name))}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.
                                                     getElementById('logout-form').
                                                     submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                             
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
          <img
            src="{{asset('/backend/dist/img/AdminLTELogo.png')}}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="{{(!empty(Auth::user()->image))?url('/upload/user_images/'.Auth::user()->image):url('/upload/nofound.png')}}" 
                style="width:50px;height:60px; border:1px solid #000"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

        @include('backend.layouts.sidebar')
        </div>
        <!-- /.sidebar -->
      </aside>
    @if ( session('success') )
            <div class="alert alert-success text-center text-white" role="alert">
              {{ session('success') }}
            </div>
       @endif

         @if ( session('error') )
            <div class="alert alert-success text-center text-white" role="alert">
              {{ session('error') }}
            </div>
       @endif
    @yield('content')
  
      <footer class="main-footer">
        <strong
          >Copyright &copy; 2014-2021
          <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0-rc
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{('backend/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('backend/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE App -->
<script src="{{asset('/backend')}}../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/backend')}}../../dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- jquery-validation -->
<script src="{{asset('/backend')}}../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('/backend')}}../../plugins/jquery-validation/additional-methods.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('#image').change(function(e){
      var reader =new FileReader();
      reader.onload =function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']); 
    });
  });


</script>
  </body>
</html>
