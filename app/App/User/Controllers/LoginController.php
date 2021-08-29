<?php

namespace App\User\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Support\Controller;

final class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function attemptLogin(Request $request): bool
    {
        $token = $this->guard()->attempt($this->credentials($request));

        if (!$token) {
            return false;
        }

        $this->guard()->setToken($token);

        return true;
    }

    protected function sendLoginResponse(Request $request): JsonResponse
    {
        $this->clearLoginAttempts($request);

        $token = (string) $this->guard()->getToken();
        $expiration = $this->guard()->getPayload()->get('exp');

        return response()->json([
            'token'      => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time(),
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
    }

    protected function guard(): Guard
    {
        return Auth::guard('api');
    }
}
