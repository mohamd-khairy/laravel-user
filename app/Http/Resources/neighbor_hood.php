<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class neighbor_hood extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {

        return[
            'id' => $this->id,
            'name' => $this->neighborhood,
            'neighborhood_key' => $this->neighborhood_key,
            'image' => $this->image ? env('CDN_read_path') . $this->image : null,
        ];

    }





}

