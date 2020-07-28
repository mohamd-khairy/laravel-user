<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class Blog extends JsonResource
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
            'title' => $this->title,
            'image' => $this->image ? env('CDN_read_path') . $this->image : null,
            'link' => $this->link,
            'blog_date' => $this->blog_date->format('M, d , Y')
        ];
    }
}

