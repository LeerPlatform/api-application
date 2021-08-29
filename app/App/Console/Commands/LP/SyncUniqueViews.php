<?php

namespace App\Console\Commands\LP;

use Domain\Topic\Models\Topic;
use Domain\Course\Models\Course;
use Illuminate\Console\Command;

class SyncUniqueViews extends Command
{
    protected $signature = 'lp:sync-unique-views';

    protected $description = 'Command description';

    public function handle(): int
    {
        $topics = Topic::all();

        $topics->each(function ($topic) {
            $topic->update([
                'unique_views_count' => views($topic)->unique()->count(),
            ]);
        });

        $courses = Course::all();

        $courses->each(function ($course) {
            $course->update([
                'unique_views_count' => views($course)->unique()->count(),
            ]);
        });

        return 0;
    }
}
