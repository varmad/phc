<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('/bower_components/admin-lte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li {{{ (Request::is('admin/dashboard') ? 'class=active' : '') }}}><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
      <li {{{ ( (Request::is('admin/users/*') || Request::is('admin/users')) ? 'class=active' : '') }}}>
        <a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Users</span></a>
      </li>
      <li {{{ ( (Request::is('admin/jobs/*') || Request::is('admin/jobs')) ? 'class=active' : '') }}}>
        <a href="{{route('jobs.index')}}"><i class="fa fa-handshake-o"></i> <span>Jobs</span></a>
      </li>
      <li {{{ ( (Request::is('admin/shifts/*') || Request::is('admin/shifts')) ? 'class=active' : '') }}}>
        <a href="{{route('shifts.index')}}"><i class="fa fa-sign-in"></i> <span>Shifts</span></a>
      </li>
      <li {{{ ( (Request::is('admin/nurse-categories/*') || Request::is('admin/nurse-categories')) ? 'class=active' : '') }}}>
        <a href="{{route('nurse-categories.index')}}"><i class="fa fa-tasks"></i> <span>Nurse Categories</span></a>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-pie-chart"></i> <span>Reports</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li {{{ ( (Request::is('admin/reports/*') || Request::is('admin/reports')) ? 'class=active' : '') }}}>
            <a href="{{route('reports.index')}}">Activity</a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-envelope"></i> <span>Email Queue</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="#">Settings</a></li>
          <li><a href="#">Template</a></li>
          <li><a href="#">View Queue</a></li>
        </ul>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
