@extends('front-end.master')
@section('content')
    @include('front-end.includes.profile-header')
    <div class="container-fluid pt-3">
        <div class="col-sm-12">
            <div class="row">
                @foreach($stories  as $story)
                    <div class="col-sm-3 mt-2 mb-2">
                        <div class="card">
                            <a href="{{route('view-own-story',['id'=>$story->id])}}" class="text-decoration-none">
                                    <img class="card-img " src="{{asset($story->story_image)}}" height="200" width=100% >
                                    <div class="card-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div><img height="35" width="35" src="{{asset($story->customer_image)}}" class="rounded-circle"></div>
                                                <div class="col-sm-9 text-sm">
                                                    <h5 class="text-dark">{{substr_replace($story->story_title,'...',15)}}</h5>
                                                    <h6 class="m-0 text-secondary">{{$story->first_name.' '.$story->last_name}}</h6>
                                                    <h6 class="m-0 text-secondary">{{$story->created_at}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </a>

                            <div class="col-sm-12 text-right mt-1">
                                @if($story->story_status==0)
                                    <button class="btn-danger btn-sm text-center disabled">{{'Inappropriate'}}</button>
                                @else
                                    <button class="btn-success btn-sm text-center disabled">{{'Appropriate'}}</button>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
