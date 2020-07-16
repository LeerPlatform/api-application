<?php

namespace App\Course\Controllers;

use App\Review\Resources\Review as ReviewResource;
use Illuminate\Http\Request;
use App\Course\Resources\ReviewCollection;
use Domain\Course\Models\Review;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class CourseReviewController extends Controller
{
    public function index()
    {
        $reviews = QueryBuilder::for(Review::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'title',
                'description',
                'description_excerpt',
                // AllowedFilter::custom('query', FilterSearchableFields::searchOn('title')),
            ])
            ->allowedSorts([
                'created_at',
            ])
            ->allowedIncludes([
                'user',
                AllowedInclude::count('studentsCount'),
            ])
            ->jsonPaginate();

        return new ReviewCollection($reviews);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'slug' => ['required', 'string', 'unique:courses'],
        //     'title' => ['required', 'string'],
        //     'headline' => ['required', 'string'],
        //     'description' => ['required', 'string'],
        //     'description_excerpt' => ['required', 'string'],
        //     'learning_points' => ['required', 'array'],
        //     'target_audience' => ['required', 'array'],
        // ]);

        // $course = new Course();
        // $course->slug = $request->input('slug');
        // $course->title = $request->input('title');
        // $course->headline = $request->input('headline');
        // $course->description = $request->input('description');
        // $course->description_excerpt = $request->input('description_excerpt');
        // $course->learning_points = $request->input('learning_points');
        // $course->target_audience = $request->input('target_audience');
        // $course->save();

        // return (new CourseResource($course))
        //     ->additional([
        //         'message' => 'Course created successfully.',
        //     ]);
    }

    public function show($id)
    {
        $review = QueryBuilder::for(Review::class)
            ->allowedIncludes([
                'units',
                'units.sections',
                'authors',
                'tags',
                'students',
                'language',
                AllowedInclude::count('studentsCount'),
            ])
            ->where('id', $id)
            ->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new CourseResource($review);
    }

    public function update(Request $request, Course $course)
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

        $course->slug = $request->input('slug');
        $course->title = $request->input('title');
        $course->headline = $request->input('headline');
        $course->description = $request->input('description');
        $course->description_excerpt = $request->input('description_excerpt');
        $course->learning_points = $request->input('learning_points');
        $course->target_audience = $request->input('target_audience');
        $course->save();

        return (new CourseResource($course))
            ->additional([
                'message' => 'Course updated successfully.',
            ]);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return (new CourseResource($course))
            ->additional([
                'message' => 'Course deleted successfully.',
            ]);
    }

    public function enroll(Course $course)
    {
        $user = $this->guard()->user();

        $user->enrolledCourses()->syncWithoutDetaching($course);

        return response()->json([
            'message' => 'Course successfully enrolled by user.',
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }
}
