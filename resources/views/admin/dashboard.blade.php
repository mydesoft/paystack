@extends('layouts.template-master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome Admin 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Registered <br>Users</span>
              <span class="info-box-number">{{$userNumber}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Active Users</span>
              <span class="info-box-number">{{$activeUsers}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inactive Users</span>
              <span class="info-box-number">{{$inActiveUsers}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Admins</span>
              <span class="info-box-number">{{$adminNumber}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class ="col-md-6 offset-md-3">
          @include('includes.message')
      </div>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="list-group">
                    <li class="list-group-item">Name : {{Auth::user()->name}}</li>
                    <li class="list-group-item">Email : {{Auth::user()->email}}</li>
                    <li class="list-group-item">Username : {{Auth::user()->username}}</li>
                    <li class="list-group-item">Role : Admin</li>
                </ul>
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

@endsection
