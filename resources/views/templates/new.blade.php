<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ReobSagi | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <link rel="icon" type="image/x-icon" href="/img/icon.jpg">
  @yield('css')
  <link rel="shortcut icon" href="{{url('img/icon.jpg')}}" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <div class="col-md-12">
     <p class="pt-2" align="center">
      Selamat Datang {{Auth::user()->name}} Di ReobSagi | 
      <a class="fa fa-sign-out" style="cursor: pointer;color: black;" 
         href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Keluar Sistem
      </a>
      <form id="logout-form" action="{{ route('logout') }}" class="d-none">
        @csrf
      </form>
    </p>
   </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('img/icon.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ReobSagi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="{{url('home')}}" class="nav-link {{Request::segment(1) == 'home'?'active':''}}">
              <i class="nav-icon fa fa-tachometer"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('kriteria')}}" class="nav-link {{Request::segment(1) == 'kriteria'?'active':''}}">
              <i class="nav-icon fa fa-list"></i>
              <p>Kriteria</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('subkriteria')}}" class="nav-link {{Request::segment(1) == 'subkriteria'?'active':''}}">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>Subkriteria</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('keluhan')}}" class="nav-link {{Request::segment(1) == 'keluhan'?'active':''}}">
              <i class="nav-icon fa fa-user"></i>
              <p>Keluhan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('obat')}}" class="nav-link {{Request::segment(1) == 'obat'?'active':''}}">
              <i class="nav-icon fa fa-medkit"></i>
              <p>Obat</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('smart')}}" class="nav-link {{Request::segment(1) == 'smart'?'active':''}}">
              <i class="nav-icon fa fa-superscript"></i>
              <p>SMART</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright © {{date('Y')}} | Novan Sandi</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('dist/js/demo.js')}}"></script>
<script src="{{url('dist/js/pages/dashboard2.js')}}"></script>
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
      $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

@yield('script')
<!-- PAGE SCRIPTS -->


</body>
</html>
