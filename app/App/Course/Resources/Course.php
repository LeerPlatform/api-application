<?php

namespace App\Course\Resources;

use App\Topic\Resources\Topic;
use App\User\Resources\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource
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
            'title'                  => $this->getTranslations('title'),
            'headline'               => $this->getTranslations('headline'),
            'description'            => $this->getTranslations('description'),
            'description_excerpt'    => $this->getTranslations('description_excerpt'),
            'learning_points'        => $this->getTranslations('learning_points'),
            // 'target_audience'        => $this->target_audience,
            // 'level'                  => $this->level,
            'estimated_duration'     => $this->estimated_duration,
            'unique_views_count'     => $this->getUniqueViewsCount(),
            'published_at'           => $this->published_at,
            'authors'                => new UserCollection($this->whenLoaded('authors')),
            'topic'                  => new Topic($this->whenLoaded('topic')),
            'tags'                   => $this->whenLoaded('tags'),
            'units'                  => $this->whenLoaded('units'),
            'students'               => $this->whenLoaded('students'),
            'language'               => $this->whenLoaded('language'),
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
