<?php

namespace Database\Seeders;

use Domain\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $cyril = User::create([
            'name'              => 'Cyril de Wit',
            'email'             => 'cyril@example.com',
            'password'          => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        $cyril->addMediaFromUrl('https://avatars1.githubusercontent.com/u/16477999')
            ->toMediaCollection('avatars');

        $john = User::create([
            'name'              => 'John de Wit',
            'email'             => 'john@example.com',
            'password'          => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        $john->addMediaFromUrl('https://avatars1.githubusercontent.com/u/16477999')
            ->toMediaCollection('avatars');

        $jane = User::create([
            'name'              => 'Jane de Wit',
            'email'             => 'jane@example.com',
            'password'          => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        $jane->addMediaFromUrl('https://avatars1.githubusercontent.com/u/16477999')
            ->toMediaCollection('avatars');
    }
}
