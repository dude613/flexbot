<?php

namespace App\Api\V1\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'task_type' => 'required',
        ];
    }
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'task_type.required' => 'Task Type is required!',
        ];
    }
}


