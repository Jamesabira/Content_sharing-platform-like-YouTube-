<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpCustomerRequest extends FormRequest
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
            'first_name'=> 'required|max:6|min:3',
            'last_name'=> 'required|max:10|min:3',
            'email'=> 'required|unique:customers,email',
            'password'=> 'required|max:20|min:8|unique:customers,password',
            'phone_number'=> 'required|min:11|max:15',
            'date_of_birth'=> 'required',
            'gender'=> 'required',
            'customer_image'=> 'required'
        ];
    }
}
