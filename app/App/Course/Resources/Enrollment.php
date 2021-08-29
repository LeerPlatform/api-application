<?php

namespace App\Course\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Enrollment extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                     => $this->id,
            'course_id'                   => $this->course_id,
            'user_id'                  => $this->user_id,
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
