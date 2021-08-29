<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
    }
}
