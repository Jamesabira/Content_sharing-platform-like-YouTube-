<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MYTUBE | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box mb-5">
    <div class="login-logo">
        <p><b>MYTUBE</b>ADMIN</p>
    </div>
    <div class="card mb-5">
        <div class="card-body login-card-body ">
            <p class="login-box-msg">Sign in to start your session</p>
            {{Form::open(['route'=>'login','method'=>'post'])}}
            <div class="input-group mb-3">
                {{Form::email('email','',['class'=>'form-control','placeholder'=>'Enter Email','required'])}}
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password','required'])}}
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    {{Form::submit('Sign In',['class'=>'btn btn-primary btn-block'])}}
                </div>
            </div>
            {{Form::close()}}
            <!-- /.social-auth-links -->
            @if (Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
            @endif
        </div>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/')}}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
