<?php

namespace App\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'ticket_subjects' => 'required',
            'ticket_type' => 'required',
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
            'ticket_subjects.required' => 'Ticket Subjects  is required!',
            'ticket_type.required' => 'Ticket Type is required!',
            'message.required' => 'Ticket message is required!',
        ];
    }
}