<?php

namespace App\User\Controllers;

use App\User\Requests\UserUpdateRequest;
use App\User\Resources\User as UserResource;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

final class UserController
{
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return response()->json([
            'message' => 'User Updated',
        ]);
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
