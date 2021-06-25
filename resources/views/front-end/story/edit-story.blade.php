@extends('front-end.master')
@section('content')
    @include('front-end.includes.profile-header')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                <div class="card bg-light">
                    <div class="card-header">
                        <h5 class="text-info text-center">Edit Story</h5>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route'=>'update-story','method'=>'post','class'=>'form-horizontal','id'=>'editStoryForm','enctype'=>'multipart/form-data']) }}
                        <div class="form-group row">
                            {{Form::label('story_title','Title',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('story_title',$story->story_title,['class'=>'form-control','required'])}}
                                {{Form::hidden('story_id',$story->id)}}
                                <span class="text-danger">{{$errors->has('story_title')? $errors->first('story_title'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('story_description','Story Description',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::textarea('story_description',$story->story_description,['class'=>'form-control','rows'=>'5','required'])}}
                                <span class="text-danger">{{$errors->has('story_description')? $errors->first('story_description'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{Form::label('story_section','Section',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                <select class="form-control" name="story_section" id="story_section"  required>
                                    <option value="" disabled>{{'--Select a Section--'}}</option>
                                    <option value="Comedy">{{"Comedy"}}</option>
                                    <option value="Tragedy">{{"Tragedy"}}</option>
                                    <option value="Rebirth">{{"Rebirth"}}</option>
                                    <option value="Sports">{{"Sports"}}</option>
                                    <option value="Entertainment">{{"Entertainment"}}</option>
                                    <option value="The Quest">{{"The Quest"}}</option>
                                    <option value="Rags to Riches">{{"Rags to Riches"}}</option>
                                    <option value="Voyage and Return">{{"Voyage and Return"}}</option>
                                    <option value="Overcoming the Monster">{{"Overcoming the Monste"}}</option>
                                </select>
                                <span class="text-danger">{{$errors->has('story_section')? $errors->first('story_section'):''}}</span>
                            </div>
                        </div>
{{--                        <label hidden>--}}
{{--                            <label hidden>{{$story_tags=''}}</label>>--}}
{{--                            <label hidden>{{$j=0}}</label>>--}}
{{--                            @foreach ($tags as $tag)--}}
{{--                                @if($j==0)--}}
{{--                                    <label hidden>{{$story_tags.=$tag->name}}</label>--}}
{{--                                @else--}}
{{--                                    <label hidden> {{$story_tags.=','.$tag->name}}</label>--}}
{{--                                @endif--}}
{{--                                <label hidden>{{$j++}}</label>--}}
{{--                            @endforeach--}}
{{--                        </label>--}}
                        <div class="form-group row">
                            {{Form::label('story_tags','',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('story_tags',$story->story_tags,['class'=>'form-control','required'])}}
                                <span class="text-danger">{{$errors->has('story_tags')? $errors->first('story_tags'):''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{Form::label('story_image','Image',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::file('story_image',['accept'=>'image/*'])}}
                                <img src="{{asset($story->story_image)}}" height="75px" width="75px" alt="">
                                <span class="text-danger">{{$errors->has('story_image')? $errors->first('story_image'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{Form::label('story_image_caption','Image Caption',['class'=>'col-sm-3'])}}
                            <div class="col-sm-9">
                                {{Form::text('story_image_caption',$story->story_image_caption,['class'=>'form-control','required'])}}
                                <span class="text-danger">{{$errors->has('story_image_caption')? $errors->first('story_image_caption'):''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-9 offset-3">
                            {{Form::submit('Update',['class'=>'btn btn-block btn-info'])}}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.forms['editStoryForm'].elements['story_section'].value = '{{$story->story_section}}';
    </script>

@endsection
