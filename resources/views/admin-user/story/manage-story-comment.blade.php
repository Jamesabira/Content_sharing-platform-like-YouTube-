@extends('admin-user.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-info">Comments Table</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <th>SL NO.</th>
                                <th>Commented By</th>
                                <th>Comment</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($comments as $comment)<tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$comment->first_name.' '.$comment->last_name}}</td>
                                    <td>{{$comment->story_comment}}</td>
                                    <td>
                                        <a href="{{route('admin-user-delete-story-comment',['id'=>$comment->id])}}" class="btn btn-danger btn-sm" title="View Comments">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>Commented By</th>
                                    <th>Comment</th>
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

