<header class="main-header">

  <!-- Logo -->
  <a href="{{route('admin.dashboard')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">PHC</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">PHC SERVICES LTD</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="{{ asset('/bower_components/admin-lte/dist/img/avatar5.png') }}" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ asset('/bower_components/admin-lte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">

              <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2012</small>
              </p>
            </li>

            @auth
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>

              <div class="pull-right">
                <a href="{{ url('/logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
              </div>
              <form id="logout-form"
                     action="{{ url('/logout') }}"
                 method="POST"
                 style="display: none;">
                             {{ csrf_field() }}
              </form>
            </li>
            @endauth

          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>
