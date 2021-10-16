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

      <div class="row">
          <div class="col-md-6">
              @include('includes.message')
          </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Admins</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($appointments->count() > 0)
               <div class = "table-responsive">
                   <table class="table table-bordered table-striped tabble-hover">
                        <thead>
                            <tr>
                                <td>Number</td>
                                <th>User Name</th>
                                <th>Appointment Reason</th>
                                <th>Appointment Name</th>
                                <th>Appointment Day</th>
                                <th>Appointment Hour(s)</th>
                                <th>Appointment Cost</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($appointments as $i => $appointment)
                            <tr>
                                <td>{{$i + 1}}</td>
                                <td>{{$appointment->user->name}}</td>
                                <td>{{$appointment->reason}}</td>
                                <td>{{$appointment->appointment_name}}</td>
                                <td>{{$appointment->appointment_day}}</td>
                                <td>
                                    <?php
                                        $hours = unserialize($appointment->hours);
                                        foreach($hours as $hour){
                                            echo $hour.'<br>';
                                        }
                                    ?>
                                </td>
                                <td>{{$appointment->cost}}</td>
                                <td>
                                     <button class = "btn btn-sm btn-danger delete-btn-handler" data-toggle="modal" data-target="#modal-default" id="{{$appointment->id}}">
                                    <i class="fa fa-trash"></i> Delete
                                  </button>
                                   <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title">Are you sure you want to delete this Booked Appointment?</h4>
                                        </div>
                                        <div class="modal-body">
                                          <a id="confirm-delete">
                                             <button class="btn btn-danger" id="delete-btn">Continue</button>
                                          </a>
                                        
                                        <button class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
                                        </div>
                                      </div>
                                      </div>
                                      </div>
                                </td>
                            </tr>  
                                
                            @endforeach
                        </tbody>
                    </table>
               </div>
               @else
                <h5 class="text-center"> No Booked Appointment Yet!</h5>
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
     const deleteBtns = document.querySelectorAll('.delete-btn-handler')
     const deleteBtn = Array.from(deleteBtns)
     console.log(deleteBtn.length)
     
     deleteBtn.forEach((btn) => {
        btn.addEventListener('click', event => {
          const id = event.target.id
          confirmDeleteBtn = document.getElementById('delete-btn')
          confirmDelete = document.getElementById('confirm-delete')
          confirmDelete.setAttribute('href', `/delete/appointment/${id}`)
        })
     })
     
 </script>
@endsection