<nav class="sb-topnav navbar navbar-expand navbar-white bg-light toppp">
    <button class="btn btn-link btn-lg order-lg-0 text-info" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    <a class="navbar-brand" href="{{url('/')}}">
        <div class="row">
            <img class="" src="{{asset('/')}}/front-end/logo/1.png" height="50" width="30">
            <h5 class="text-info text-bold mt-3 ">{{'MyTube'}}</h5>
        </div>
    </a>
    <!-- Navbar Search-->
    <div class="col-sm-8">
        {{Form::open(['route'=>'search','method'=>'post','class'=>'form-inline offset-lg-4'])}}
            <div class="input-group">
                {{Form::text('search','',['class'=>'form-control','required','placeholder'=>"Search for story here...."])}}
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        {{Form::close()}}
    </div>
    <div class="ml-lg-5">
        <ul class="navbar-nav ml-lg-5 ">
            <li class="nav-item dropdown">
                @if(Session::has('userId'))
                    <a class="nav-link dropdown-toggle text-info" id="userDropdown" href="" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Session::get('userName')}}
                        <i class="fas fa-user-circle fa-lg fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item text-info" href="{{ route('signOut-customer') }}"
                           onclick="event.preventDefault();
                   document.getElementById('logout-form').submit()">
                            {{ 'Logout' }}
                        </a>
                        <form method="post"  action="{{ route('signOut-customer') }}" id="logout-form">
                            @csrf
                        </form>
                    </div>
                @else
                    <a class="nav-link dropdown-toggle text-info  " id="userDropdown" href="" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-lg fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="userDropdown">
                        <a class="dropdown-item text-info" href="{{route('login-customer')}}">Login</a>
                        <div class="dropdown-divider text-info"></div>
                        <a class="dropdown-item text-info" href="{{route('register-customer')}}">Register</a>
                        @endif
                    </div>
            </li>
        </ul>
    </div>
</nav>
