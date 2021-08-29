<?php

namespace App\Course\Controllers;

use App\Course\Resources\Course as CourseResource;
use Domain\User\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Course\Resources\CourseCollection;
use Domain\Course\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use App\Course\QueryBuilder\PopularSort;
use App\Course\QueryBuilder\FilterSearchableFields;
use Support\Controller;
use Illuminate\Http\JsonResponse;

final class CourseController extends Controller
{
    public function index(): CourseCollection
    {
        $courses = QueryBuilder::for(Course::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('slug'),
                'title',
                'headline',
                'description',
                'description_excerpt',
                AllowedFilter::custom('query', FilterSearchableFields::searchOn('title', 'headline', 'description', 'description_excerpt')),
                AllowedFilter::exact('topic.id'),
                AllowedFilter::exact('language.id'),
                AllowedFilter::exact('level'),
            ])
            ->allowedSorts([
                'created_at',
                AllowedSort::custom('popular', new PopularSort(), '')
            ])
            ->allowedIncludes([
                'topic',
                'units',
                'units.sections',
                'authors',
                'tags',
                'students',
                'language',
                AllowedInclude::count('studentsCount'),
            ])
            ->jsonPaginate();

        return new CourseCollection($courses);
    }

    public function store(Request $request): CourseResource
    {
        $request->validate([
            'slug' => ['required', 'string', 'unique:courses'],
            'title' => ['required', 'string'],
            'headline' => ['required', 'string'],
            'description' => ['required', 'string'],
            'description_excerpt' => ['required', 'string'],
            'learning_points' => ['required', 'array'],
            'target_audience' => ['required', 'array'],
        ]);

        $course = new Course();
        $course->setAttribute('slug', $request->input('slug'));
        $course->setAttribute('title', $request->input('title'));
        $course->setAttribute('headline', $request->input('headline'));
        $course->setAttribute('description', $request->input('description'));
        $course->setAttribute('description_excerpt', $request->input('description_excerpt'));
        $course->setAttribute('learning_points', $request->input('learning_points'));
        $course->setAttribute('target_audience', $request->input('target_audience'));
        $course->save();

        return (new CourseResource($course))
            ->additional([
                'message' => 'Course created successfully.',
            ]);
    }

    public function show($id): CourseResource
    {
        $course = QueryBuilder::for(Course::class)
            ->allowedIncludes([
                'topic',
                'units',
                'units.sections',
                'authors',
                'tags',
                'language',
            ])
            ->where('id', $id)
            ->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new CourseResource($course);
    }

    public function update(Request $request, Course $course): CourseResource
    {
        $request->validate([
            'slug' => ['required', 'string'],
            'title' => ['required', 'string'],
            'headline' => ['required', 'string'],
            'description' => ['required', 'string'],
            'description_excerpt' => ['required', 'string'],
            'learning_points' => ['required', 'array'],
            'target_audience' => ['required', 'array'],
        ]);

        $course->setAttribute('slug', $request->input('slug'));
        $course->setAttribute('title', $request->input('title'));
        $course->setAttribute('headline', $request->input('headline'));
        $course->setAttribute('description', $request->input('description'));
        $course->setAttribute('description_excerpt', $request->input('description_excerpt'));
        $course->setAttribute('learning_points', $request->input('learning_points'));
        $course->setAttribute('target_audience', $request->input('target_audience'));
        $course->save();

        return (new CourseResource($course))
            ->additional([
                'message' => 'Course updated successfully.',
            ]);
    }

    public function destroy(Course $course): CourseResource
    {
        $course->delete();

        return (new CourseResource($course))
            ->additional([
                'message' => 'Course deleted successfully.',
            ]);
    }

    public function enroll(Course $course): JsonResponse
    {
        /** @var User $user */
        $user = $this->guard()->user();

        $user->enrolledCourses()->syncWithoutDetaching($course);

        return response()->json([
            'message' => 'Course successfully enrolled by user.',
        ]);
    }

    public function guard(): Guard
    {
        return Auth::guard('api');
    }
}
