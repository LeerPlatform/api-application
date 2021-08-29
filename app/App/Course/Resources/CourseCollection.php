<?php

namespace App\Course\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
