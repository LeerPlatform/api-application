<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Language\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    public function run(): void
    {
        Language::create([
            'locale' => 'nl',
            'display_name' => [
                'en' => 'Dutch',
                'nl' => 'Nederlands',
            ],
            'script' => 'Latn',
            'regional' => 'nl_NL'
        ]);
    }
}
