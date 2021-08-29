<?php

namespace App\User\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

final class LogoutController extends Controller
{
    public function __invoke()
    {
        $this->guard()->logout();
    }

    protected function guard(): Guard
    {
        return Auth::guard('api');
    }
}
