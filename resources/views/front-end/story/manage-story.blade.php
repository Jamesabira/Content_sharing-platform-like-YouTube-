@extends('front-end.master')
@section('content')
    @include('front-end.includes.profile-header')
    <div class="container-fluid" id="manage-story">
            <div class="row">
                <div class="col-sm-12 mt-2 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-info">Stories</h4>
                        </div>
                        <div class="card-body ">
                            <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                            <div class="table-responsive ">
                                <table class="table table-sm table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr class="bg-info text-white">
                                        <th>SL NO.</th>
                                        <th>Title</th>
                                        <th>Section</th>
                                        <th>Tags</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr class="bg-info text-white">
                                        <th>SL NO.</th>
                                        <th>Title</th>
                                        <th>Section</th>
                                        <th>Tags</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($stories as $story)
{{--                                        <label hidden>--}}
{{--                                            <label hidden>{{$story_tags=''}}</label>>--}}
{{--                                            <label hidden>{{$j=0}}</label>>--}}
{{--                                                @foreach ($tags as $tag)--}}
{{--                                                    @if($j==0)--}}
{{--                                                        @if($tag->story_tag_id == $story->id)--}}
{{--                                                            <label hidden>{{$story_tags.=$tag->name}}</label>--}}
{{--                                                        @endif--}}
{{--                                                    @else--}}
{{--                                                        @if($tag->story_tag_id == $story->id)--}}
{{--                                                            <label hidden> {{$story_tags.=','.$tag->name}}</label>--}}
{{--                                                        @endif--}}
{{--                                                    @endif--}}
{{--                                                    <label hidden>{{$j++}}</label>--}}
{{--                                                @endforeach--}}
{{--                                        </label>--}}
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$story->story_title}}</td>
                                            <td>{{$story->story_section}}</td>
{{--                                            <td>{{$tags[$i-2][1]}}</td>--}}
                                            <td>{{$story->story_tags}}</td>
                                            <td>
                                                <img src="{{asset($story->story_image)}}" alt=""  height="50" width="50">
                                            </td>
                                            <td>
                                                <a href="{{route('view-story-details',['id'=>$story->id])}}" class="btn btn-info btn-sm" title="View Details">
                                                    <span class="fa fa-eye"></span>
                                                </a>
                                                <a href="{{route('edit-story',['id'=>$story->id])}}" class="btn btn-success btn-sm" title="Edit">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                <a class="btn  btn-danger btn-sm" href="{{ route('delete-story') }}"
                                                   onclick="event.preventDefault();document.getElementById('story-delete-form').submit()">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                {{ Form::open(['route'=>'delete-story','method'=>'post','id'=>'story-delete-form'])}}
                                                {{ Form::hidden('story_id',$story->id)}}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

@endsection
