<?php

use Illuminate\Database\Seeder;
use Domain\Language\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
