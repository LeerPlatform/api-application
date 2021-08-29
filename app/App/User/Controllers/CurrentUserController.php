<?php

namespace App\User\Controllers;

use App\User\Resources\User as UserResource;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

final class CurrentUserController extends Controller
{
    public function __invoke(): UserResource
    {
        return new UserResource($this->guard()->user());
    }

    protected function guard(): Guard
    {
        return Auth::guard('api');
    }
}
