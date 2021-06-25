@extends('front-end.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3" style="padding-top: 150px;">
{{--                ,--}}
            {{Form::open(['route'=>'customer-sign-in','method'=>'post','class'=>'form-horizontal'])}}
            <div class="form-group" >
                <div class="input-group-prepend ">
                    <span class="input-group-text bg-light border border-info "><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i></span>
                    {{Form::email('email','',['class'=>'form-control border border-info ','placeholder'=>'Enter Email','required'])}}
                </div>
                <br>
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light border border-info "><i class="fa fa-key fa-lg" aria-hidden="true"></i></span>
                    {{Form::password('password',['class'=>'form-control border border-info  ','placeholder'=>'Enter Password','required'])}}
                </div>
                <br>
                {{Form::submit('Sign In',['class'=>'form-control btn btn-block btn-info'])}}
            </div>
            {{Form::close()}}
            <h5 class="text-center text-danger" id="message">{{Session::get('message')}}</h5>
            <br>
        </div>
    </div>
</div>
@endsection
