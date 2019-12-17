<?php

namespace App\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required',
            'currency'=> 'required',
            'source'=> 'required',
            'description'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'amount.required' => 'Amount is required!',
            'currency.required' => 'Currency is required!',
            'source.required' => 'Source Token is required!',
            'description.required' => 'Description is required!',
        ];
    }
}
