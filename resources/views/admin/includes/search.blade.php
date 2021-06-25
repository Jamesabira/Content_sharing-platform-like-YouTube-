<div class="col-sm-12 pt-3">
    <div class="card">
        <div class="card-body">
            {{Form::open(['route'=>'admin-search','method'=>'post','class'=>'form-inline offset-lg-4'])}}
            <div class="input-group">
                {{Form::text('search','',['class'=>'form-control','required','placeholder'=>"Search for story here....",'style'=>'width:350px !important'])}}
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
            {{Form::close()}}
            <div class="text-right">
                <a href="{{route('admin-view-stories')}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>{{'  View All'}}</a>
            </div>
        </div>
    </div>
</div>
