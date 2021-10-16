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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Registered Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if ($users->count() > 0)
                
               <div class = "table-responsive">
                   <table class="table table-bordered table-striped tabble-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Registration Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach ($users as $user)
                                  <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->username}}</td>

                                <td>
                                @if ($user->status === 'Inactive')
                                   <i class= "fa fa-times"></i> {{$user->status}}
                                   @else
                                     <i class= "fa fa-check-circle"></i> {{$user->status}}
                                @endif
                                </td>

                                
                                <td>
                                @if ($user->status === 'Inactive')
                                    <form method ="POST" action = "{{route('activate', $user->id)}}">
                                    @csrf
                                        <button class="btn btn-sm btn-info">
                                            <i class="fa fa-check-circle"></i> Activate
                                        </button>
                                    </form>
                                @else
                                    <form method ="POST" action = "{{route('deactivate', $user->id)}}">
                                    @csrf
                                        <button class="btn btn-sm btn-info">
                                            <i class="fa fa-times"></i> Deactivate
                                        </button>
                                    </form>
                                @endif
                                </td>

                                <td>
                                  <button class = "btn btn-sm btn-danger delete-btn-handler" data-toggle="modal" data-target="#modal-default" id="{{$user->id}}">
                                    <i class="fa fa-trash"></i> Delete
                                  </button>
                                   <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title">Are you sure you want to delete this user?</h4>
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
                <h4 class ="text-center"> No Registered Users Yet!</h5>
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
     deleteBtn.forEach((btn) => {
        btn.addEventListener('click', event => {
          const id = event.target.id
          confirmDeleteBtn = document.getElementById('delete-btn')
          confirmDelete = document.getElementById('confirm-delete')
          confirmDelete.setAttribute('href', `/delete/${id}`)
        })
     })
 </script>
@endsection
