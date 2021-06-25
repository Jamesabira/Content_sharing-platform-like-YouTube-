@extends('front-end.master')
@section('content')
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="row">
                @if(count($stories))
                @foreach($stories as $story)
                    <div class="col-sm-3 mt-2 mb-2">
                        <a href="{{route('view-story',['id'=>$story->id])}}" class="text-decoration-none"><div class="card">
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
                            </div>
                        </a>
                    </div>
                @endforeach
                @else
                    <div class="col-sm-12 mt-5">
                        <h5 class="text-danger text-center text-info">{{'Sorry, No story found!'}}</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
