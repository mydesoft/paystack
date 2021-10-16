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
              <h3 class="box-title">{{$workshop->name}}</h3>
              <button class="btn btn-primary pull-right btn-sm" id="edit-btn"><i class="fa fa-edit"></i> Edit</button>
              <button class="btn btn-danger pull-right btn-sm show-times" id="cancel-btn"><i class="fa fa-times"></i> Cancel</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <form method="POST" action="{{route('updateWorkshop', $workshop->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><h5>Workshop Name</h5></label>
                            <input type="text" name= "name" class="form-control" value="{{$workshop->name}}" disabled="true" id="name">

                            <label for="name"><h5>Opening Days</h5></label>
                            <input type="text" name= "day" class="form-control" value="{{$workshop->day}}" disabled="true" id="day">
                            
                                <div class="row show-times" id="times">
                                    <h5 class="text-danger text-center">  Update desired hours of opening</h5>
                                      @foreach($workshopHour as $hour)
                                      <div class="col-md-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="time[]" value="{{$hour}}" checked>
                                            {{$hour}}
                                          </label>
                                        </div>
                                      </div>
                                      @endforeach
                                      
                                     @if(count($results))
                                      @foreach($results as $result)
                                      <div class="col-md-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="time[]" value="{{$result}}" >
                                            {{$result}}
                                          </label>
                                        </div>
                                      </div>
                                      @endforeach
                                     @endif
                                </div>
                            </div>
                        
                        <div class="text-center">
                            <button class="btn btn-success" id="update-btn" disabled="true">Update Workshop</button>

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

@section('extra-js')
  <script>
      const editBtn = document.getElementById('edit-btn')
      const hours = document.getElementById('hours')
      const name = document.getElementById('name')
      const day = document.getElementById('day')
      const times = document.getElementById('times')
      const updateBtn = document.getElementById('update-btn')
      const cancelBtn = document.getElementById('cancel-btn')
      
      function removeDisabledHandler(){
          editBtn.classList.add('show-times')
          cancelBtn.classList.remove('show-times');
          name.removeAttribute('disabled')
          day.removeAttribute('disabled')
          updateBtn.removeAttribute('disabled')
          times.classList.remove('show-times')
      }

      function addDisabledHandler(){
          editBtn.classList.remove('show-times')
          cancelBtn.classList.add('show-times');
          name.setAttribute('disabled', true)
          day.setAttribute('disabled', true)
          updateBtn.setAttribute('disabled', true)
          hours.classList.remove('show-times')
          times.classList.add('show-times')
      }

      editBtn.addEventListener('click', removeDisabledHandler)
      cancelBtn.addEventListener('click', addDisabledHandler)

  </script>
@endsection


