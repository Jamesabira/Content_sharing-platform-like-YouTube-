<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Story;
use Image;
use Illuminate\Http\Request;
use DB;
use Session;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $customerId = Session::get('userId');
        $stories = DB::table('stories')
            ->where('customer_id','=',$customerId)
            ->join('customers','stories.customer_id','=','customers.id')
            ->select('stories.*','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
            ->get();
        $numberOfStory = count($stories);
        Session::put('numberOfStory',$numberOfStory);
        return view('front-end.profile.profile',[
            'stories'=>$stories
        ]);
    }
    public function showAbout()
    {
        $customerId = Session::get('userId');
        $customer = Customer::findOrFail($customerId);
        return view('front-end.about.about',[
            'customer'=>$customer
        ]);
    }
    public function showEditAbout()
    {
        $customerId = Session::get('userId');
        $customer = Customer::findOrFail($customerId);
        return view('front-end.about.edit-about',[
            'customer'=>$customer
        ]);
    }
    protected function uploadCustomerImage($request){
        $customerImage = $request->file('customer_image');
        $imageType = $customerImage->getClientOriginalExtension();
        $imageName = $request->first_name.' '.$request->last_name.'-'.rand(100,999999).'.'.$imageType;
        $directory = 'front-end/customer-images/';
        $imageUrl = $directory.$imageName;
        Image::make($customerImage)->save($imageUrl);
        return $imageUrl;

    }
    public function updateAbout(Request $request)
    {

        $customer = Customer::findOrFail($request->customer_id);

        $customer->first_name   = $request->first_name;
        $customer->last_name    = $request->last_name;
        $customer->email        = $request->email;
        if($request->password)
        {
            $customer->password     = bcrypt($request->password);
        }
        $customer->date_of_birth= $request->date_of_birth;
        $customer->phone_number = $request->phone_number;
        $customer->gender       = $request->gender;
        $image = $request->file('customer_image');
        if($image)
        {
            unlink($customer->customer_image);
            $imageUrl = $this->uploadCustomerImage($request);
            $customer->customer_image = $imageUrl;
        }
        $customer->save();
        Session::put('userFullName',$customer->first_name.' '.$customer->last_name);
        Session::put('userImage',$customer->customer_image);

        return redirect('about')->with('message','Profile updated Successfully');
    }
}
