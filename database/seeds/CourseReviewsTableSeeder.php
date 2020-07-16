<?php

use Illuminate\Database\Seeder;
use Domain\Course\Models\Review;

class CourseReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'title' => 'Amazing course about PHP',
        ]);
    }
}
