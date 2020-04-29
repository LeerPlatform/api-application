<?php

namespace App\Course\Controllers;

use App\Course\Resources\CourseCollection;
use App\Course\Resources\Course as CourseResource;
use Domain\Course\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class PopularCoursesController extends Controller
{
    public function __invoke()
    {
        $topics = QueryBuilder::for(Course::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('slug'),
                'title',
                'headline',
                'description',
                'description_excerpt',
            ])
            ->allowedIncludes([
                'topic',
                'units',
                'units.sections',
                'authors',
                'tags',
            ])
            ->orderBy('unique_views_count', 'desc')
            ->jsonPaginate();

        return new CourseCollection($topics);
    }
}
