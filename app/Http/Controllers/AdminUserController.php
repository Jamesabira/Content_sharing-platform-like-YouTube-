<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\SignInAdminUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\AdminUser;
use Image;
use Session;

class AdminUserController extends Controller
{
    public function showUserRegistration()
    {
        return view('admin.user.add-user');
    }

    public function saveUser(SaveUserRequest $request)
    {
        $request['password']= bcrypt($request->password) ;
        AdminUser::create($request->validate());
        return redirect('/register/user')->with('message','Admin User Save Successfully!');
    }
    public function showManageAdminUser()
    {
        $adminUsers = AdminUser::all();
        return view('admin.user.manage-user',[
            'adminUsers'=>$adminUsers
        ]);
    }
    public function showEditUser($id)
    {
        $adminUser = AdminUser::findOrFail($id);
        return view('admin.user.edit-user',[
            'adminUser'=>$adminUser
        ]);
    }
    public function updateUser(UpdateUserRequest $request)
    {
        $adminUser = AdminUser::findOrFail($request->user_id);
        $adminUser->update($request->all());
        return redirect('/manage/admin/user')->with('message','Edit admin user successfully!');
    }
    public function deleteUser($id)
    {
        $adminUser = AdminUser::findOrFail($id);
        $adminUser->delete();
        return redirect('/manage/admin/user')->with('message','admin user remove successfully!');
    }

    public function showAdminUserLogin()
    {
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return redirect('/admin/home');
        }
        return view('admin-user.auth.admin-user-login');
    }

     public function signInAdminUser(SignInAdminUserRequest $request)
     {
         $adminUser = AdminUser::where('user_email','=', $request->user_email)->first();

         if ($adminUser) {

            if(password_verify($request->password,$adminUser->password)){

                 Session::flush();
                 Session::put('adminId', $adminUser->id);
                 Session::put('adminName', $adminUser->user_name);
                 Session::put('userType', 'adminUser');


                 return redirect('/admin/home');
             } else {
                 return redirect('/admin-login')->with('message', 'Invalid password!! Please, input a valid password !');
             }
         } else {
             return redirect('/admin-login')->with('message', 'You have to Register first to Login !!');
         }
        }

    public function showAdminPanel()
    {
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return view('admin-user.home.home');
        }
        return redirect('/admin-login');
    }

    public function logoutAdminUser()
    {
        Session::flush();
        return redirect('/admin-login');
    }



}
