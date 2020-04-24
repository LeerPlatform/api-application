<?php

namespace App\User\Controllers;

use Illuminate\Support\Facades\Auth;
use Support\Controller;

final class LogoutController extends Controller
{
    public function __invoke()
    {
        $this->guard()->logout();
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
