<?php

namespace App\Course\Resources;

use App\Topic\Resources\Topic;
use App\User\Resources\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
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
            'id'           => $this->id,
            'title'        => $this->title,
            'rating'       => $this->rating,
            'user'         => $this->whenLoaded('user'),
            'course'         => $this->whenLoaded('course'),
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
