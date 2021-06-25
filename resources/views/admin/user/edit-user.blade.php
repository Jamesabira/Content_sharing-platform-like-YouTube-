@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-2">
                <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-primary">Add User</h4>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route'=>'update-user','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                        <div class="form-group row">
                            {{Form::label('user_name','User Name',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('user_name',$adminUser->user_name,['class'=>'form-control','required'])}}
                                {{Form::hidden('user_id',$adminUser->id)}}
                                <span class="text-danger">{{$errors->has('user_name')? $errors->first('user_name'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('user_email','Email',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::email('user_email',$adminUser->user_email,['class'=>'form-control','required'])}}
                                <span class="text-danger">{{$errors->has('user_email')? $errors->first('user_email'):''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-9 offset-3">
                            {{Form::submit('Update',['class'=>'btn btn-block btn-primary'])}}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
