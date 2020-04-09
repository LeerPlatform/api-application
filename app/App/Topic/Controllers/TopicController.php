<?php

namespace App\Topic\Controllers;

use App\Course\Resources\CourseCollection;
use App\Topic\Resources\Topic as TopicResource;
use App\Topic\Resources\TopicCollection;
use Domain\Topic\Models\Topic;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class TopicController extends Controller
{
    protected function index()
    {
        $topics = QueryBuilder::for(Topic::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('slug'),
                'display_name',
                'description',
            ])
            ->allowedIncludes([
                'courses',
            ])
            ->get();

        return new TopicCollection($topics);
    }
}
