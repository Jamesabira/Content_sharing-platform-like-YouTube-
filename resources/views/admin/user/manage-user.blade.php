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
                                    <th>Registration Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($adminUsers as $adminUser)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$adminUser->user_name}}</td>
                                        <td>{{$adminUser->user_email}}</td>
                                        <td>{{$adminUser->created_at}}</td>
                                        <td>
                                            <a href="{{route('edit-user',['id'=>$adminUser->id])}}" class="btn btn-primary btn-xs" title="Edit">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <a  href="{{route('delete-user',['id'=>$adminUser->id])}}" class="btn btn-danger btn-xs" title="Delete">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>User Name</th>
                                    <th>Email</th>
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

