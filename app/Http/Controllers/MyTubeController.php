<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use DB;

class MyTubeController extends Controller
{
    public function showHome()
    {

        $stories = DB::table('stories')
            ->where('story_status','=',1)
            ->join('customers','stories.customer_id','=','customers.id')
            ->select('stories.*','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
            ->orderby('id','DESC')->get();
        return view('front-end.home.home',[
            'stories'=>$stories
        ]);
    }




}
