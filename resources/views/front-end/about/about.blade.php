@extends('front-end.master')
@section('content')
    @include('front-end.includes.profile-header')
    <div class="container pt-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-info">About</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h5 class="text-center text-success" id="message">{{Session::get('message')}}</h5>
                            <div class="col-md-8 offset-md-2 text-center " >
                                <img src="{{asset($customer->customer_image)}}" class="round img-fluid img-thumbnail" height="300" width="300">
                            </div>
                            <div class="col-md-2 text-center">
                                <a class="btn btn-info btn-block mt-5 " href="{{route('edit-about')}}"><i class="fas fa-edit"></i>{{'  Edit'}}</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-hover">
                                <tr>
                                    <th class="w-25 text-right">Full Name:</th>
                                    <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right">email:</th>
                                    <td>{{$customer->email}}</td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right">Phone Number :</th>
                                    <td>{{$customer->phone_number}}</td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right">Gender:</th>
                                    <td>{{$customer->gender}}</td>
                                </tr>
                                <tr>
                                    <th class="w-25 text-right">Date of Birth:</th>
                                    <td>{{$customer->date_of_birth}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


