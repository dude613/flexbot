<?php

namespace App\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyCreditRequest extends FormRequest
{
    public function rules()
    {
        return [
            'credit_amount' => 'required'
            ,'pkg_id' => 'required'
            ,'credit_type' => 'required'
        ];
    }
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'credit_amount.required' => 'Credit Amount is required!',
            'pkg_id.required' => 'Package is required!'
        ];
    }
}
