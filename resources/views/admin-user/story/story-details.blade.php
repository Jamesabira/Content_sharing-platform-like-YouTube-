@extends('admin-user.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="text-success">Story Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="w-25">Story Title:</th>
                                    <td>{{$story->story_title}}</td>
                                </tr>
                                <tr>
                                    <th class="w-25">Story Tags:</th>
                                    <td>{{$story->story_tags}}</td>
                                </tr>
                                <tr>
                                    <th>Story Body:</th>
                                    <td>{{$story->story_description}}</td>
                                </tr>
                                <tr>
                                    <th>Story Section:</th>
                                    <td>{{$story->story_section}}</td>
                                </tr>
                                <tr>
                                    <th>Story Image:</th>
                                    <td><img src="{{asset($story->story_image)}}"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
@endsection

