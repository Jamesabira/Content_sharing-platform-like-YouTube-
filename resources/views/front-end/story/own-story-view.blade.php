@extends('front-end.master')
@section('content')
    @include('front-end.includes.profile-header')
    <div class="container pt-1">
        <div class="col-sm-12 mt-4">
            <div class="col-sm-10 offset-sm-1">
                <img class="img-fluid img-thumbnail"  src="{{asset($requireStory->story_image)}}" alt="">
            </div>
                <h4 class="mt-3">{{$requireStory->story_title}}</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="text-left">{{$requireStory->updated_at}}</h6>
                    </div>
                </div>
                <hr class="bg-dark m-0">
                <div class="col-sm-8">
                    <div class="row pt-3">
                        <div><img height="40" width="40" src="{{asset(Session::get('userImage'))}}" class="rounded-circle"></div>
                        <div class="text-sm ml-3 mt-1">
                            <h5><b>{{Session::get('userFullName')}}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-4">
                    <label>{{$requireStory->story_description}}</label>
                    <br>
                    <br>
                    <label>{{"Section : ".$requireStory->story_section}}</label>
                    <br>
                    <label>{{"Tags : ".$requireStory->story_tags}}</label>
                </div>
                <hr class="bg-dark">
                <h5 class="text-secondary mt-3 mb-3">{{'Comments '.$numberOfComments}}</h5>
                <div>
                    {{ Form::open(['route'=>'submit-comment','method'=>'post','class'=>'form-horizontal']) }}
                    <div class="form-group row">
                        <div class="col-sm-9">
                            {{Form::textarea('story_comment','',['class'=>'form-control','required','rows'=>'1','placeholder'=>'Enter Your comment...'])}}
                            {{Form::hidden('story_id',$requireStory->id)}}
                            <span class="text-danger">{{$errors->has('story_title')? $errors->first('story_title'):''}}</span>
                        </div>
                        <div class="col-sm-3">
                            {{Form::submit('Comment',['class'=>'btn btn-block btn-info'])}}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="col-sm-12 mt-2 mb-2">
                    @foreach($comments as $comment)
                        <div class="row pt-3">
                            <div class="col-sm-9  mt-1">
                                <div class="row">
                                    <div><img height="35" width="35" src="{{asset($comment->customer_image)}}" class="rounded-circle"></div>
                                    <div class=" ml-2 mt-2 ">
                                        <h6><b>{{$comment->first_name.' '.$comment->last_name}}</b></h6>
                                        <label>{{$comment->story_comment}}</label>
                                    </div>
                                </div>
                            </div>
                            @if(Session::get('userId')==$requireStory->customer_id)
                                <div class="col-sm-2  text-right ml-2">
                                    <a class="btn btn-outline-danger" href="{{ route('delete-comment') }}"
                                       onclick="event.preventDefault();document.getElementById('comment-delete-form').submit()">
                                        <i class="fas fa-trash"></i> {{' Delete'}}
                                    </a>
                                    {{ Form::open(['route'=>'delete-comment','method'=>'post','id'=>'comment-delete-form'])}}
                                    {{Form::hidden('comment_id',$comment->id)}}
                                    {{Form::hidden('story_id',$requireStory->id)}}
                                    {{ Form::close() }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
@endsection
