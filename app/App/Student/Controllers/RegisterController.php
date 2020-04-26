<?php

namespace App\Student\Controllers;

use App\User\Resources\User as UserResource;
use Domain\User\Models\User;
use Domain\Student\Models\StudentAccount;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Support\Controller;

final class RegisterController extends Controller
{
    use RegistersUsers;

    protected function registered(Request $request, User $user)
    {
        return new UserResource($user);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // $user->addMediaFromUrl('https://picsum.photos/id/237/60/60')
        //     ->toMediaCollection('avatars');

        $user->studentAccount()->save(new StudentAccount());

        return $user;
    }

    protected function guard()
    {
        return Auth::guard('api');
    }
}
