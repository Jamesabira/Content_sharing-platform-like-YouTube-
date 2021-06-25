<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if(Session::has('userId'))
                    <a class="nav-link collapsed" href="{{route('/')}}">
                        <div class="sb-nav-link-icon mr-4"><i class="fas fa-home fa-lg text-info"></i></div>
                        {{ __('Home') }}
                    </a>
                    <a class="nav-link collapsed" href="{{route('view-profile')}}">
                        <div class="sb-nav-link-icon mr-4"><i class="fas fa-user fa-lg text-info"></i></div>
                        {{ __('Profile') }}
                    </a>
                @else
                    <hr class="bg-dark">
                    <div class="m-5 ">
                        <label class="text-danger text-justify-left text-bold text-lg">{{'Log In or Register to share, comment,and post story.' }}</label>
                        <a class="nav-link collapsed border text-info border-info" href="{{route('login-customer')}}">
                            <div class="sb-nav-link-icon mr-3 text-center"><i class="fas fa-sign-in-alt text-info fa-lg"></i></div>
                            {{'LOGIN'}}
                        </a>
                        <a class="nav-link collapsed border text-info border-info mt-2" href="{{route('register-customer')}}">
                            <div class="sb-nav-link-icon mr-3 text-center"><i class="fas fa-user-plus text-info fa-lg"></i></div>
                            {{'Register'}}
                        </a>
                    </div>
                    <hr class="bg-dark">
                @endif
            </div>
        </div>
    </nav>
</div>
