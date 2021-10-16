<!DOCTYPE html>
<html><meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Astract | User Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  {{-- <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Astract </b>User</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/avatar.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/avatar.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->username}}
                
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-primary btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>
  </header>

    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/avatar.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active menu-open">
          <a href="{{route('user-dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li>
            <a href="{{route('workshops')}}">
              <i class="fa fa-bookmark"></i>
              <span>Available Workshops</span>
            </a>          
          </li>

          <li>
            <a href="{{route('appointment')}}">
              <i class="fa fa-calendar-minus-o"></i>
              <span>Your Booked Appointment(s)</span>
            </a>
          </li>

         <li>
            <a href="{{route('logout')}}">
              <i class="fa fa-sign-out text-danger"></i>
              <span>Logout</span>
            </a>          
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome {{Auth::user()->name}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Booked Appointment(s)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($appointments->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Workshop Name</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Amount</th>
                            </tr>

                            <tbody>
                                @foreach($appointments as $i => $appointment)
                                <tr>
                                    <td>{{$i + 1}}</td>
                                    <td>{{$appointment->appointment_name}}</td>
                                    <td>{{$appointment->appointment_day}}</td>
                                    <td>
                                        <?php
                                            $hours = unserialize($appointment->hours);
                                            foreach($hours as $hour){
                                                echo $hour.',';
                                            }
                                        ?>
                                    </td>
                                    <td>{{$appointment->cost}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
                @else
                <h4 class="text-center">You have no booked appointment!</h4>
                @endif
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div>
    </section>
    <!-- /.content -->

  <footer class="main-footer">
    <strong>Astract Test 2021 </strong>
  </footer>

  
  
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
{{-- <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script> --}}
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
{{-- <script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script> --}}
<!-- jvectormap  -->
{{-- <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script> --}}

<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('dist/js/pages/dashboard2.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
</body>
</html>