<?php

namespace App\Course\Resources;

use App\Topic\Resources\Topic;
use App\User\Resources\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'                     => $this->getAttribute('id'),
            'slug'                   => $this->getAttribute('slug'),
            'title'                  => $this->getTranslations('title'),
            'headline'               => $this->getTranslations('headline'),
            'description'            => $this->getTranslations('description'),
            'description_excerpt'    => $this->getTranslations('description_excerpt'),
            'learning_points'        => $this->getTranslations('learning_points'),
            // 'target_audience'        => $this->target_audience,
            // 'level'                  => $this->level,
            'estimated_duration'     => $this->getAttribute('estimated_duration'),
            'unique_views_count'     => $this->getUniqueViewsCount(),
            'published_at'           => $this->getAttribute('published_at'),
            'authors'                => new UserCollection($this->whenLoaded('authors')),
            'topic'                  => new Topic($this->whenLoaded('topic')),
            'tags'                   => $this->whenLoaded('tags'),
            'units'                  => $this->whenLoaded('units'),
            'students'               => $this->whenLoaded('students'),
            'students_count'         => $this->getAttribute('students_count'), // Look if it's possible to only load when count att is available
            'thumbnail_url'          => $this->getFirstMediaUrl('thumbnails', 'thumbnail'), // What will be returned when no image is found? Maybe placeholder
            'language'               => $this->whenLoaded('language'),
            'created_at'             => $this->getAttribute('created_at'),
            'updated_at'             => $this->getAttribute('updated_at'),
        ];
    }
}
