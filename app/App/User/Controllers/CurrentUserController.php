<?php

namespace App\User\Controllers;

use App\User\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

final class CurrentUserController extends Controller
{
    public function __invoke()
    {
        return new UserResource($this->guard()->user());
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
