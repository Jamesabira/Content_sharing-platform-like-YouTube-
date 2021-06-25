<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/admin/home')}}" class="nav-link">Home</a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>
    </li>
    <li class="nav-item dropdown ">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Session::get('adminName') }}  <span><i class="fa fa-user-o" aria-hidden="true"></i></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout-admin-user') }}"
               onclick="event.preventDefault();document.getElementById('logout-adminUser-form').submit();"> {{ __('Logout') }}</a>
            {{Form::open(['route'=>'logout-admin-user','method'=>'post','id'=>'logout-adminUser-form'])}}
            {{Form::close()}}
        </div>
    </li>
</ul>
</nav>
