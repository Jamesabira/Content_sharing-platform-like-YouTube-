@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-info">Users Table</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Registration Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone_number}}</td>
                                        <td>{{$customer->created_at}}</td>
                                        <td>
                                            @if($customer->customer_status==1)
                                                <a  href="{{route('blocked-customer',['id'=>$customer->id])}}" class="btn btn-success btn-xs" title="Blocked Customer">
                                                    <span class="fa fa-lock-open"></span>
                                                </a>
                                            @else
                                                <a  href="{{route('unblocked-customer',['id'=>$customer->id])}}" class="btn btn-danger btn-xs" title="Blocked Customer">
                                                    <span class="fa fa-lock"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Registration Date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

