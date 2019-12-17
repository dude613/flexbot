<?php

namespace App\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketReplyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ticket_id' => 'required',
            'message' => 'required'
        ];
    }
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'ticket_id.required' => 'ticket id  is required!',
            'message.required' => 'Ticket message is required!',
        ];
    }
}
