<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name'=> 'required|alpha_num|max:6|min:3|regex:/^\S*$/u|unique:admin_users,user_name',
            'user_email'=> 'required|ends_with:gmail.com,email.com|unique:admin_users,user_email',
            'password'=> 'required|max:30|min:8|unique:admin_users,password'
        ];
    }
}
