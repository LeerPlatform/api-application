<?php

namespace App\Course\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Unit extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                     => $this->id,
            'slug'                   => $this->slug,
            'title'                  => $this->title,
            'description'            => $this->description,
            'course'                => new Course($this->whenLoaded('course')),
            'sections'                  => new SectionCollection($this->whenLoaded('section')),
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
