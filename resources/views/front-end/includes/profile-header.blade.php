<style>
    body {margin:0;}
    .topnav {
        overflow: hidden;
        background-color: #f1f1f1;
    }
    .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        border-bottom: 3px solid transparent;
    }

    .topnav a:hover {
        border-bottom: 3px solid black;
    }

</style>

<div class="container-fluid bg-light">
    <div class="col-sm-12" >
        <div class="row " >
            <div class="col-sm-2 p-2 text-center ">
                <label hidden>{{$userImage=Session::get('userImage')}}</label>
                <img src="{{asset($userImage)}}" class="rounded-circle"  height="150" width="150" alt="">
            </div>
            <div class="col-sm-4 text-dark pt-md-5 text-center text-sm-left">
                <h2>{{Session::get('userFullName')}}</h2>
                <label hidden>{{$numberOfStory=Session::get('numberOfStory')}}</label>
                @if($numberOfStory)
                    <h6>{{'Number of Stories '.Session::get('numberOfStory')}}</h6>
                @else
                    <h6>{{"You didn't upload any story yet!"}}</h6>
                @endif
            </div>
            <div class="col-sm-6 pt-md-5 ml-0"></div>
        </div>
    </div>
</div>

<div class="topnav container-fluid">
    <a class="active" href="{{route('view-profile')}}">Home</a>
    <a class="" href="{{route('manager-manage-story')}}">Manage Stories</a>
    <a class=""  href="{{route('post-story')}}">Post Story</a>
    <a class=""  href="{{route('view-about')}}">About</a>
</div>
