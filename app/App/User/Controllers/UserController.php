<?php

namespace App\User\Controllers;

use App\User\Requests\UserUpdateRequest;
use App\User\Resources\User as UserResource;
use App\User\Resources\UserCollection;
use Domain\User\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\JsonResponse;

final class UserController
{
    public function index(): UserCollection
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'name',
            ])
            ->allowedIncludes([
                'enrolledCourses',
            ])
            ->get();

        return new UserCollection($users);
    }

    public function show(User $user): UserResource
    {
        $user = QueryBuilder::for(User::class)
            ->allowedIncludes([
                'enrolledCourses',
            ])
            ->where('id', $user->getKey())
            ->first();

        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return response()->json([
            'message' => 'User Updated',
        ]);
    }

    public function destroy(User $user): UserResource
    {
        $user->delete();

        return (new UserResource($user))
            ->additional([
                'message' => 'User deleted successfully.',
            ]);
    }

    protected function guard(): Guard
    {
        return Auth::guard('api');
    }
}
