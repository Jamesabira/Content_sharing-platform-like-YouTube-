
@extends('front-end.master')
@section('content')
    @include('front-end.includes.profile-header')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                <div class="card bg-light">
                    <div class="card-header">
                        <h5 class="text-info text-center">Edit About</h5>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route'=>'update-about','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'editAboutForm']) }}
                        <div class="form-group row">
                            {{Form::label('first_name','First Name',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('first_name',$customer->first_name,['class'=>'form-control','required'])}}
                                {{Form::hidden('customer_id',Session::get('userId'))}}
                                <span class="text-danger">{{$errors->has('first_name')? $errors->first('first_name'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('last_name','Story',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::textarea('last_name',$customer->last_name,['class'=>'form-control','rows'=>'3','required'])}}
                                <span class="text-danger">{{$errors->has('last_name')? $errors->first('last_name'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('phone_number','Phone Number',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('phone_number',$customer->phone_number,['class'=>'form-control','placeholder'=>'Phone Number','required'])}}
                                <span class="text-danger">{{$errors->has('phone_number')? $errors->first('phone_number'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('email','Email',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::email('email',$customer->email,['class'=>'form-control','placeholder'=>'Email','required'])}}
                                <span class="text-danger">{{$errors->has('customer_image')? $errors->first('customer_image'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('password','Password',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'])}}
                                <span class="text-danger">{{$errors->has('password')? $errors->first('password'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('date_of_birth','Date of Birth',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{ Form::text('date_of_birth',$customer->date_of_birth, ['class' => 'form-control ','required','placeholder'=>'Enter Date of Birth','id' => 'date']) }}
                                <span class="text-danger">{{$errors->has('date_of_birth')? $errors->first('date_of_birth'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('gender','Gender',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="" disabled>{{'Select Gender'}}</option>
                                    <option value="Male">{{"Male"}}</option>
                                    <option value="Female">{{"Female"}}</option>
                                    <option value="Other">{{"Other"}}</option>
                                </select>
                                <span class="text-danger">{{$errors->has('gender')? $errors->first('gender'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('customer_image','Image',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::file('customer_image',['accept'=>'image/*'])}}
                                <img src="{{asset($customer->customer_image)}}" height="75px" width="75px" alt="">
                            </div>
                        </div>
                        <div class="col-sm-9 offset-3">
                            {{Form::submit('Update',['class'=>'btn btn-block btn-info'])}}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.forms['editAboutForm'].elements['gender'].value = '{{$customer->gender}}';
    </script>

@endsection
