<?php

namespace App\Topic\Resources;

use App\Course\Resources\CourseCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Topic extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                 => $this->id,
            'slug'               => $this->slug,
            'display_name'       => $this->getTranslations('display_name'),
            'description'        => $this->getTranslations('description'),
            // 'status'             => $this->status,
            'unique_views_count' => $this->getUniqueViewsCount(),
            'courses'            => new CourseCollection($this->whenLoaded('courses')),
        ];
    }
}
