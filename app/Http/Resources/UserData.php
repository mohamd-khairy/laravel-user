<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserData extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id ,
            'first_name' =>$this->first_name ,
            'last_name' =>$this->last_name ,
            'email' => $this->email ,
            'gender' => $this->gender ,
            'personal_phone' => $this->personal_phone ,
            'Birth Date' => date(' d, M , Y ' , strtotime($this->date_of_birth)),
            'Shipping Address' => null ,
            'Payment Method' => null ,
        ];
    }
}
