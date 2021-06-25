@extends('admin-user.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-info">Stories Table</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th>SL NO.</th>
                                    <th>Title</th>
                                    <th>Section</th>
                                    <th>Tags</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($stories as $story)<tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$story->story_title}}</td>
                                        <td>{{$story->story_section}}</td>
                                        <td>{{$story->story_tags}}</td>
                                        <td>
                                            <img src="{{asset($story->story_image)}}" alt=""  height="50" width="50">
                                        </td>
                                        <td>
                                            <a href="{{route('admin-user-view-story-details',['id'=>$story->id])}}" class="btn btn-info btn-sm" title="View Details">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                            <a href="{{route('admin-user-view-story-comment',['id'=>$story->id])}}" class="btn btn-success btn-sm" title="View Comments">
                                                <span class="fa fa-comment"></span>
                                            </a>
                                            @if($story->story_status==1)
                                                <a href="{{route('admin-user-make-unlisted',['id'=>$story->id])}}" class="btn  btn-danger btn-sm" title="Make Unlisted">
                                                    <span class="fa fa-unlink"></span>
                                                </a>
                                            @else
                                                <a href=""  onclick="return false" class="btn  btn-secondary btn-sm" title="Unlisted">
                                                    <span class="fa fa-unlink"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL NO.</th>
                                    <th>Title</th>
                                    <th>Section</th>
                                    <th>Tags</th>
                                    <th>Image</th>
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

