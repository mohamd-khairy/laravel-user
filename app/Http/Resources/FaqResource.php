<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        foreach ($this as $items) {
            foreach ($items as $item) {
                $data[] =  [
                    'id' => $item->id,
                    'ask' => $item->ask,
                    'answer' => $item->answer,
                    'category' =>  [
                        'id' => $item->category->id,
                        'name' => $item->category->name
                    ]

                ];
            }
        }

        return $data;
    }
}
