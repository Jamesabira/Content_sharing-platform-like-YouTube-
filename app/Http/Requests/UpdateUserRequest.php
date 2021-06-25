<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
//            Rule::unique('admin_users')->ignore($this->request)
        ];
    }
}
