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
        <div class="col-md-7">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Workshop</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <form method="POST" action="{{route('createWorkshop')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><h5>Workshop Name</h5></label>
                            <input type="text" name= "name" class="form-control" placeholder="e.g: Programming">

                            <label for="name"><h5>Opening Days</h5></label>
                            <input type="text" name= "day" class="form-control" placeholder="e.g: Tuesday 20 September, 2021">
                            <h4>
                                <h5 class="text-danger">Please Select desired hours of opening</h5>
                                Opening Hours
                            </h4> 
                            <div class="row">
                                @foreach($times as $time)
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="time[]" value="{{$time->name}}">
                                                {{$time->name}}
                                            </label>
                                        </div>
                                    </div>
                                 @endforeach
                                </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success">Create Workshop</button>

                        </div>
                    </form>
                    
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
</div>
    </section>

    <!-- /.content -->
  

  <footer class="main-footer">
    <strong>Astract Test 2021 </strong>
  </footer>

  
  
  <div class="control-sidebar-bg"></div>

@endsection


