@extends('front-end.master')
@section('content')

    <div class="container">
        <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
        <div class="row">
            <div class="col-sm-6 offset-sm-3  p-5" >
                {{ Form::open(['route'=>'signup-customer','method'=>'post','enctype'=>'multipart/form-data']) }}
                <div class="form-group row">
                    {{Form::text('first_name','',['class'=>'form-control','placeholder'=>'First Name','required'])}}
                    <span class="text-danger">{{$errors->has('first_name')? $errors->first('first_name'):''}}</span>

                </div>
                <div class="form-group row">
                    {{Form::text('last_name','',['class'=>'form-control','placeholder'=>'Last Name','required'])}}
                    <span class="text-danger">{{$errors->has('last_name')? $errors->first('last_name'):''}}</span>

                </div>
                <div class="form-group row">
                    {{Form::email('email','',['class'=>'form-control','placeholder'=>'Email','required'])}}
                    <span class="text-danger">{{$errors->has('email')? $errors->first('email'):''}}</span>
                </div>
                <div class="form-group row">
                    {{Form::text('phone_number','',['class'=>'form-control','placeholder'=>'Phone Number','required'])}}
                    <span class="text-danger">{{$errors->has('phone_number')? $errors->first('phone_number'):''}}</span>
                </div>
                <div class="form-group row">
                    <select class="form-control" name="gender" required>
                        <option value="" disabled selected>{{'Select Gender'}}</option>
                        <option value="Male">{{"Male"}}</option>
                        <option value="Female">{{"Female"}}</option>
                        <option value="Other">{{"Other"}}</option>
                    </select>
                    <span class="text-danger">{{$errors->has('gender')? $errors->first('gender'):''}}</span>
                </div>
                <div class="form-group row">
                    {{ Form::text('date_of_birth','', ['class' => 'form-control ','required','placeholder'=>'Enter Date of Birth','id' => 'date']) }}
                    <span class="text-danger">{{$errors->has('date_of_birth')? $errors->first('date_of_birth'):''}}</span>
                </div>

                <div class="form-group row">
                    {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'])}}
                    <span class="text-danger">{{$errors->has('password')? $errors->first('password'):''}}</span>

                </div>
                <div class="form-group row">
                    {{Form::file('customer_image',['accept'=>'image/*','required'])}}
                    <span class="text-danger">{{$errors->has('customer_image')? $errors->first('customer_image'):''}}</span>
                </div>
                <div class="form-group row">
                    {{Form::submit('Register',['class'=>'btn btn-block btn-info'])}}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
