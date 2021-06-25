<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{asset('/')}}/front-end/logo/1.png" type="image">
    <title>MyTube</title>
    <link href="{{asset('/')}}front-end/css/styles.css" rel="stylesheet" />
    <link href="{{asset('/')}}front-end/css/bootstrap.css" rel="stylesheet" />
    <link href="{{asset('/')}}front-end/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front-end/css/jquery.datetimepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('/')}}front-end/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}front-end/ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}front-end/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">




</head>
<body class="sb-nav-fixed">

    @include('front-end.includes.header')

<div id="layoutSidenav">

    @include('front-end.includes.menu')

    <div id="layoutSidenav_content">

    @yield('content')

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; 2020 | All Rights Reserved</div>
                    <div>
                        <a href="">Privacy Policy</a>
                        &middot;
                        <a href="">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}front-end/js/scripts.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.datetimepicker.full.min.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}front-end/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}front-end/assets/demo/datatables-demo.js"></script>
 <script src="{{asset('/')}}front-end/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}front-end/js/bootstrap.js"></script>


    <script>
        $(document).ready(function () {

            $('.topnav > a')
                .click(function (e) {
                    $('.topnav > a')
                        .removeClass('active');
                    $(this).addClass('active');
                });
        });


        $(document).ready(function (){
            $('#message').click(function (){
                $(this).text('');
            });
        });
        $('#date').datetimepicker({
            format:'Y-m-d',
            maxDate: 0
        });
    </script>
    <script>
        initSample();
    </script>
</body>
</html>
