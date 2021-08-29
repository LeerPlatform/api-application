<?php

namespace App\Topic\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TopicCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
