
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Drain Waste Trap</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" href="{{ asset('dist/img/logo.png')}}" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datepicker.min.css')}}"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.css"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css"> 
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #1e7bfe;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="#" class="nav-link"><h5><b>CLUB MANAGEMENT SYSTEM</b></h5></a> -->
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">

        <!-- <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"> -->
        <div class="input-group-append">

     {{--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><h5><b>Eco-Care Drainage</b></h5></a>
      </li> --}}
   <!-- <h5><b>CLUB MANAGEMENT SYSTEM</b></h5> -->
          <!-- <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button> -->
        </div>
      </div>
    </form>

    <?php 
      use App\Models\Notifications;
      $totalNotification = Notifications::where('n_status','1')->count();
      $Notifications = Notifications::where('n_status','1')->get();
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">{{$totalNotification}}</span>
        </a>
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 320px;">
          <span class="dropdown-header">{{$totalNotification}} Notifications</span>
           @foreach ($Notifications as $key => $value)
          <div class="dropdown-divider"></div>
          <a href="{{ url('notification/update',$value->id) }}" class="dropdown-item">
            <p><i class="fas fa-exclamation-circle mr-2"></i> [ALERT {{ $value->device->d_serial_no}}] - Water Level is rising</p>
          </a>
          
          <div class="dropdown-divider"></div>
           @endforeach
          {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
        </div>
        
      </li>
     
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: black;">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
     {{--  <img src="{{ asset('dist/img/logo.png') }}" alt="Unikl Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Drain Waste Trap</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('/uploads/'.'/'.Auth::user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                  <i class="fas fa-home nav-icon text-white"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/devices') }}" class="nav-link {{ Request::is('devices') ? 'active' : '' }}">
                  <i class="fas fa-tablet nav-icon text-white"></i>
                  <p>Devices</p>
                </a>
              </li>
{{-- 
              <li class="nav-item">
                <a href="{{ url('/notification') }}" class="nav-link {{ Request::is('notification') ? 'active' : '' }}">
                  <i class="fas fa-bell nav-icon text-white"></i>
                  <p>Notifications</p>
                </a>
              </li> --}}

              <li class="nav-item">
                <a href="{{ url('/wastetrap') }}" class="nav-link {{ Request::is('wastetrap') ? 'active' : '' }}">
                  <i class="fas fa-map-marker nav-icon text-white"></i>
                  <p>Waste Trap</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/history') }}" class="nav-link {{ Request::is('history') ? 'active' : '' }}">
                  <i class="fas fa-history nav-icon text-white"></i>
                  <p>History</p>
                </a>
              </li>
             
               <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                  <i class="fa fa-users nav-icon text-white"></i>
                  <p>User Management</p>
                </a>
                 </li>
             
               <li class="nav-item">
                 <form method="POST" action="{{ route('logout') }}">
                <a href="{{ route('logout') }}" class="nav-link "
                 onclick="event.preventDefault();
                  this.closest('form').submit();">
                  <i class="fa fa-power-off nav-icon text-danger"></i>
                  <p>{{ __('Logout') }}</p> @csrf
                                 
                </a>
                   </form>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  <!-- Main Footer -->
  <footer class="main-footer" style="background-color: #1e7bfe; color: white;">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline" style="color: white;">
      Aimi Rusdi
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 UTM JOHOR.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() {

    $('.table').DataTable( {
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   0
        } ],
        order: [ 1, 'asc' ]
    } );
    $( ".datepicker" ).datepicker({
       format: 'dd/mm/yyyy',
       autoclose: "true",
       todayHighlight: "true",
       minDate: 0,

    });
    $('.clockpicker').clockpicker({
      autoclose: true,
      'default': 'now'
    });
} );


function goDoSomething(d){
    var d_serial_no = d.getAttribute("data-serial");
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
          type: 'POST',
          url: "{{ url('/notification/store') }}",
          data: { _token: CSRF_TOKEN, d_serial_no: d_serial_no},
          success: function (response) {
              if (response === 'ok') {
                  setTimeout(function(){
                     window.location.reload();
                  }, 10000);
              } else {
                  
              }
          }
      });    
        return false;
}


</script>
@toastr_render
</body>
</html>
