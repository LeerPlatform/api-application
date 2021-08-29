<?php

namespace App\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['string', 'max:255'],
            'email'    => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
        ];
    }
}
