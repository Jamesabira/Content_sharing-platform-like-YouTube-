<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Session;

class SearchController extends Controller
{
    public function searchResult(Request $request)
    {
        $this->validate($request,[
            'search'=> 'required'
        ]);
        $stories = Story::query()
            ->orWhere('story_title','Like', '%'.$request->search.'%')
            ->orWhere('story_description','Like', '%'.$request->search.'%')
            ->orWhere('story_section','Like', '%'.$request->search.'%')
            ->orWhere('story_tags','Like', '%'.$request->search.'%')
            ->join('customers','stories.customer_id','=','customers.id')
            ->select('stories.*','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
            ->get();

        return view('front-end.home.home',[
            'stories'=>$stories
        ]);
    }

    public function searchByAdmin(Request $request)
    {
        $this->validate($request,[
            'search'=> 'required'
        ]);
        $stories = Story::query()
            ->orWhere('story_title','Like', '%'.$request->search.'%')
            ->orWhere('story_description','Like', '%'.$request->search.'%')
            ->orWhere('story_section','Like', '%'.$request->search.'%')
            ->orWhere('story_tags','Like', '%'.$request->search.'%')
            ->join('customers','stories.customer_id','=','customers.id')
            ->select('stories.*','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
            ->get();


        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return view('admin-user.story.view-stories',[
                'stories'=>$stories
            ]);
        }
        return view('admin.story.view-stories',[
            'stories'=>$stories
        ]);
    }
}
