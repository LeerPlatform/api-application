<?php

namespace App\Language\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LanguageCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
