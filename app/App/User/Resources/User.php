<?php

namespace App\User\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'avatar'            => optional($this->getMedia('avatars')->first())->getUrl('thumb'),
            'email_verified_at' => $this->email_verified_at,
            'last_login_at'     => $this->last_login_at,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
