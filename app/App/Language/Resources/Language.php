<?php

namespace App\Language\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Language extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'display_name'  => $this->getTranslations('display_name'),
            'locale'        => $this->locale,
            'script'        => $this->script,
            'regional'      => $this->script,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
