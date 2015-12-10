
<header class="main-header"><a href="/" class="logo">Admin</a>
  <nav role="navigation" class="navbar navbar-static-top">
    <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" role="button" class="sidebar-toggle"><span class="sr-only">Toggle navigation</span></a>
    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
@if(Session::has('messages'))
        <li class="dropdown messages-menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-envelope-o"></i><span class="label label-success">{{ count(Session::get('messages')) }}</span></a>
          <ul class="dropdown-menu">
            <li class="header">Hai {{ count(Session::get('messages')) }} messaggi</li>
<?php $iterator = 0; ?>
@foreach(Session::get("messages") as $idx => $msg)
            <li>
              <ul class="menu">
                <!-- messages-->
                <li><a href="#"><i class="fa fa-users text-aqua">{{ $msg }}</i></a></li>
              </ul>
            </li>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


            <li class="footer"><a href="#">Vedi tutti i messaggi</a></li>
          </ul>
        </li>
@endif

@if($errors->count() > 0)
        <li class="dropdown notifications-menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-bell-o"></i><span class="lavel label-warning">{{ $errors->count() }}</span></a>
          <ul class="dropdown-menu">
            <li class="header">Hai {{ $errors->count() }} notifiche</li>
<?php $iterator = 0; ?>
@foreach($errors->all() as $idx => $error)
            <li>
              <ul class="menu">
                <!-- notifications-->
                <li><a href="#"><i class="fa fa-users text-aqua">{{ $error }}</i></a></li>
              </ul>
            </li>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


            <li class="footer"><a href="#">Vedi tutte le notifiche</a></li>
          </ul>
        </li>
@endif

@if(Session::has('issues'))
        <li class="dropdown tasks-menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-flag-o"></i><span class="lavel label-danger">{{ count(Session::get('issues')) }}</span></a>
          <ul class="dropdown-menu">
            <li class="header">Hai {{ count(Session::get('issues')) }} issue aperte</li>
<?php $iterator = 0; ?>
@foreach(Session::get("issues") as $idx => $issue)
            <li>
              <ul class="menu">
                <!-- issues-->
                <li><a href="#">
                    <h3>{{ $issue->content }}<small class="pull-right">{{ $issue->percentage }}%</small></h3></a></li>
              </ul>
            </li>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


            <li class="footer"><a href="#">Vedi tutte le issues</a></li>
          </ul>
        </li>
@endif

        <li class="dropdown user user-menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><img src="https://placehold.it/160x160" alt="User img" class="user-image"/><span class="hidden-xs">{{ Auth::user()->name }}</span></a>
          <ul class="dropdown-menu">
            <li class="user-header"><img src="https://placehold.it/160x160" alt="User img" class="user-image"/>
              <p>{{ Auth::user()->email }}</p><small>Livello: {{ Auth::user()->level }}</small>
            </li>
            <li class="user-body">
              <div class="col-xs4 text-center"><a href="#">Wok in progress</a></div>
            </li>
            <li class="user-footer">
              <div class="pull-left"><a href="/admin/profile" class="btn btn-default btn-flat">Profilo</a></div>
              <div class="pull-right"><a href="/auth/logout" class="btn btn-default btn-flat">Logout</a></div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>