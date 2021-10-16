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
        <li><a href="{{route('admin-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Workshop</li>
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Created Workshop</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row" style="margin-bottom: 20px;">
              <div class="col-md-4">
                <form action="">
                  <label for="search">Search</label>
                  <input type="text" class="form-control" id="search" placeholder="search workshops...">
                </form>
              </div>
            </div>
            <h4 id="no-data"></h4>
            @if ($workshops->count() > 0)
               <div class = "table-responsive">
                   <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Workshop Name</th>
                                <th>Workshop Day</th>
                                <th>Workshop Hours</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach ($workshops as $i => $workshop)
                                <tr id="workshop-row">
                                <td>{{$i + 1}}</td>
                                <td id="workshop-name">{{$workshop->name}}</td>
                                <td>{{$workshop->day}}</td>
                                
                                <td>
                                  <?php
                                  $workshopHour = unserialize($workshop->time);
                                  foreach($workshopHour as $hour){
                                    echo $hour .'<br>';
                                  }
                                  ?>
                                </td>
                                
                               <td>
                                   <a href="{{route('viewWorkshop', $workshop->id)}}"><button class="btn btn-sm btn-info"><i class="fa fa-eye"></i>View</button></a>
                               </td>

                                <td>
                                  <a href="/workshop/delete/{{$workshop->id}}">
                                    <button class = "btn btn-sm btn-danger">
                                      <i class="fa fa-trash"></i> Delete
                                    </button>
                                  </a>
                                   
                                </td>
                            </tr>
                            
                          @endforeach
                        </tbody>
                    </table>
               </div>
               @else
                <h4 class ="text-center"> No Workshop created Yet!</h5>
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

@endsection

@section('extra-js')
 <script>
     document.getElementById('search').addEventListener('keyup', () => {
       const name = event.target.value.toUpperCase();
       const tableRows = document.querySelectorAll('#workshop-row');
       const tableData = document.querySelectorAll('#workshop-name');
       tableRows.forEach(workshop => {
         const workshopName = workshop.firstElementChild.nextElementSibling.textContent.toUpperCase()
         if (workshopName.indexOf(name) > -1) {
           workshop.style.display = '';
         }
         else {
           workshop.style.display = 'none';
          
         }

       });
     })
 </script>
@endsection
