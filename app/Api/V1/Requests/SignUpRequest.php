<?php

namespace App\Api\V1\Requests;

//use Config;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'email.required' => 'Email  is required!',
            'password.required' => 'Password Type is required!',
            'first_name.required' => 'First Name is required!',
            'last_name.required' => 'Last Name is required!',
        ];
    }
}
