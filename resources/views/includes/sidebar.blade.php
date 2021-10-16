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
          <a href="{{route('admin-dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li>
          <a href="{{route('registeredUsers')}}">
            <i class="fa fa-users"></i>
            <span>Registered Users</span>
          </a>          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Admins</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admins')}}"><i class="fa fa-user-secret"></i> All Admins</a></li>
            <li>
              <a href="" data-toggle="modal" data-target="#modal-addAdmin">
                <i class="fa fa-user-plus"></i> Add New Admin
              </a>
            </li> 
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Contact Messages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('unreadMessages')}}"><i class="fa fa-envelope-square"></i> Unead Message(s)</a></li>
            <li><a href="{{route('readMessages')}}"><i class="fa fa-envelope-o"></i> Read Message(s)</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa  fa-bookmark"></i>
            <span>Workshop</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('showWorkshop')}}"><i class="fa fa-eye"></i> View Workshop(s)</a></li>
            <li><a href="{{route('create')}}"><i class="fa fa-plus-square"></i> Create New Workshop(s)</a></li>
            
          </ul>
        </li>

        <li>
            <a href="{{route('bookedAppointment')}}">
              <i class="fa fa-calendar-minus-o"></i>
              <span>Booked Users Appointment</span>
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

   <div class="modal fade" id="modal-addAdmin">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Admin</h4>
              </div>
              <div class="modal-body">
              <form method ="POST" action="{{route('addAdmin')}}">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                  <label for="confirm password">Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                  <button class="btn btn-success">Create New Admin</button>
                </div>
              </form>                           
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
  </div>