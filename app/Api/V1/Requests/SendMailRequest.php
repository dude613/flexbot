<?php

namespace App\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'to_email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];
    }
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'to_email.required' => 'Name is required!',
            'subject.required' => 'Name is required!',
            'message.required' => 'Message Body is Required',
        ];
    }
}
