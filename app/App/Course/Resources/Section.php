<?php

namespace App\Course\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Section extends JsonResource
{
    public function toArray($request): array
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
