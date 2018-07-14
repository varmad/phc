
<nav class="navbar navbar-default">
  <div class="container-fluid1">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="">
      <ul class="nav navbar-nav">
        <li {{{ ( (Request::is('profile') || Request::is('profile-edit') ) ? 'class=selected' : '') }}}>
          <a href="{{route('profile.index')}}" >Profile</a>
        </li>


        @hasrole('staff')
        <li {{{ ( (Request::is('shift-list') ) ? 'class=selected' : '') }}}>
          <a href="{{route('shift-list.index')}}">New Shift</a>
        </li>
        <li {{{ ( (Request::is('shift-dropout') ) ? 'class=selected' : '') }}}>
          <a href="{{route('shift.dropout')}}"> Dropout </a>
        </li>
        <li {{{ ( (Request::is('my-calender') ) ? 'class=selected' : '') }}}>
          <a href="{{route('calender.my-calender')}}">Shifts</a>
        </li>
        @else
        <li {{{ ( (Request::is('requirment/create') ) ? 'class=selected' : '') }}}>
          <a href="{{route('requirment.create')}}">New Requirement</a>
        </li>
        <li {{{ ( (Request::is('requirment') || Request::is('shift-accepted-list/*') ) ? 'class=selected' : '') }}}>
          <a href="{{route('requirment.index')}}">Shift Accepted Profiles</a>
        </li>
        @endhasrole

        <li {{{ ( (Request::is('profile-change-password') ) ? 'class=selected' : '') }}}>
          <a href="{{route('profile.change-password')}}">Change Password</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="logout"><a href="{{ url('/logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form"
               action="{{ url('/logout') }}"
           method="POST"
           style="display: none;">
           {{ csrf_field() }}
        </form>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>
