<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Astract </b>Admin</span>
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
         
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger">{{$contactNumber}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{$contactNumber}} message(s)</li>
              <li>
                @if($contacts->count() > 0)
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach ($contacts as $contact)
                      <li><!-- start message -->
                    <a href="{{route('unreadMessages')}}">
                      <h4>
                      {{$contact->subject}}
                      </h4>
                        <p>{{$contact->name}}</p>
                      <p>{{$contact->email}}</p>
                    </a>
                  </li>
                  @endforeach
                  <!-- end message -->
                </ul>
                @else
                  <h6 class="text-center">No Messages Yet!</h6>
                @endif
              </li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/avatar.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->username}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/avatar.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}}
                  
                
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