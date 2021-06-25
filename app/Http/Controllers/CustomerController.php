<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInCustomerRequest;
use App\Http\Requests\SignUpCustomerRequest;
use App\Models\Customer;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class CustomerController extends Controller
{
    public function showCustomerRegister()
    {
        return view('front-end.auth.sign-up');
    }
    public function showSignInCustomer()
    {
        if(Session::has('userId'))
        {
            return redirect('/');
        }
        else
        {
            return view('front-end.auth.sign-in');
        }
    }
    public function signInCustomer(SignInCustomerRequest $request){

        $customer = Customer::where('email','=',$request->email)->firstOrFail();
        if($customer)
        {
            if($customer->customer_status==1)
            {

            if(password_verify($request->password,$customer->password)){

                    Session::flush();
                    Session::put('userId',$customer->id);
                    Session::put('userName',$customer->first_name);
                    Session::put('userFullName',$customer->first_name.' '.$customer->last_name);
                    Session::put('userImage',$customer->customer_image);


                    return redirect('/');
                }else{
                    return redirect('/signIn')->with('message','Invalid password!! Please, input a valid password !');
                }

            }
            else{
                return redirect('/signIn')->with('message','You have been blocked by Administration !!');
            }
        }
        else{
            return redirect('/signIn')->with('message','You have to Register first to Login !!');
        }

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
    public function signUpCustomer(SignUpCustomerRequest $request){

        $imageUrl = $this->uploadCustomerImage($request);
        $customer = new Customer();
        $customer->first_name   = $request->first_name;
        $customer->last_name    = $request->last_name;
        $customer->email        = $request->email;
        $customer->password     = bcrypt($request->password);
        $customer->date_of_birth= $request->date_of_birth;
        $customer->phone_number = $request->phone_number;
        $customer->gender       = $request->gender;
        $customer->customer_image= $imageUrl;
        $customer->save();

        Session::flush();
        Session::put('userId',$customer->id);
        Session::put('userName',$customer->first_name);
        Session::put('userFullName',$customer->first_name.' '.$customer->last_name);
        Session::put('userImage',$customer->customer_image);

        // $data= $customer->toArray();

//        Mail::send('front-end.mail.confirmation-mail',$data,function($message) use ($data){
//            $message->to($data['email']);
//            $message->subject('Confirmation mail');
//        });
        return redirect('/');
    }

    public function signOutCustomer(Request $request){

        Session::flush();
        return redirect('/');
    }

    public function showManageCustomer()
    {
        $customers = Customer::all();
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return view('admin-user.customer.manage-customer',[
                'customers'=>$customers
            ]);
        }
        return view('admin.customer.manage-customer',[
            'customers'=>$customers
        ]);
    }
    public function blockCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->customer_status = 0;
        $customer->save();
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return redirect('/admin/manage/user')->with('message','User has been blocked successfully');

        }
        return redirect('/manage/user')->with('message','User has been blocked successfully');
    }
    public function unblockCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->customer_status = 1;
        $customer->save();
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return redirect('/admin/manage/user')->with('message','User has been unblocked successfully');

        }
        return redirect('/manage/user')->with('message','User has been unblocked successfully');
    }
}
