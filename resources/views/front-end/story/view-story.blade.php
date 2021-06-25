@extends('front-end.master')
@section('content')
    <div class="container-fluid pt-1">
        <div class="col-sm-12 mt-4">
            <div class="row">
                <div class="col-sm-8 ">
                        <img class="img-fluid img-thumbnail"  src="{{asset($requireStory->story_image)}}" alt="">
{{--                       <iframe class="border-0 "  src="{{asset($requireStory->story_image)}}" height="325" width="810"></iframe>--}}
                    <h4 class="mt-3">{{$requireStory->story_title}}</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="text-left">{{$requireStory->created_at}}</h6>
                        </div>
                        <div class="col-sm-6 text-md-right ">
                            @if(Session::has('userId'))
                                @if($requireStory->customer_id!= Session::get('userId'))
                                    <a class="btn btn-xs" href="{{ route('share-story') }}"
                                       onclick="event.preventDefault();document.getElementById('story-share-form').submit()">
                                        <i class="fas fa-share"></i> {{' Share'}}
                                    </a>
                                    {{ Form::open(['route'=>'share-story','method'=>'post','id'=>'story-share-form'])}}
                                    {{Form::hidden('story_id',$requireStory->id)}}
                                    {{ Form::close() }}
                                @endif
                            @endif
                        </div>
                    </div>
                    <hr class="bg-dark m-0">
                    <div class="col-sm-8">
                        <div class="row pt-3">
                            <div><img height="40" width="40" src="{{asset($customer->customer_image)}}" class="rounded-circle"></div>
                            <div class="text-sm ml-3 mt-1">
                                <h5><b>{{$customer->first_name.' '.$customer->last_name}}</b></h5>
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
                    @if(Session::has('userId'))
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
                    @else
                        <h6 class="text-danger">{{'Please login or register for do comment & view comment'}}</h6>
                    @endif
                </div>
                <div class="col-sm-4 pl-md-1 mr-md-0">
                    @foreach($stories as $story)
                            <div class="col-sm-12 pb-2">
                                <a href="{{route('view-story',['id'=>$story->id])}}" class="text-decoration-none"><div class="card">
                                        <img class="card-img " src="{{asset($story->story_image)}}" height="200" width=100% >
                                        <div class="card-body row">
                                            <div class="col-sm-12">
                                                <div class="row ">
                                                    <div><img height="35" width="35" src="{{asset($story->customer_image)}}" class="rounded-circle"></div>
                                                    <div class="col-sm-9 text-sm">
                                                        <h5 class="text-dark">{{substr_replace($story->story_title,'...',15)}}</h5>
                                                        <h6 class="m-0 text-secondary">{{$story->first_name.' '.$story->last_name}}</h6>
                                                        <h6 class="m-0 text-secondary">{{$story->created_at}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
