<?php

namespace App\Course\Resources;

use App\Topic\Resources\Topic;
use App\User\Resources\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Section extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                     => $this->id,
            'slug'                   => $this->slug,
            'title'                  => $this->title,
            'content_type'            => $this->content_type,
            'content'            => $this->content,
            'unit'                => new Unit($this->whenLoaded('unit')),
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
