<?php

namespace App\Console\Commands\LP;

use Domain\Topic\Models\Topic;
use Illuminate\Console\Command;

class SyncUniqueViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lp:sync-unique-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $topics = Topic::all();

        $topics->each(function ($topic) {
            $topic->update([
                'unique_views_count' => views($topic)->count(),
            ]);
        });
    }
}
