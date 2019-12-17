<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CreditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'credit_id' => $this->credit_id,
            'user_id' => $this->user_id,
            'user' => $this->user->only('name'),
            'credit_amount' => $this->credit_amount,
        ];
    }
}
