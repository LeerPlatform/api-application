<?php

namespace App\Course\Controllers;

use App\Course\Resources\Course as CourseResource;
use App\Course\Resources\Enrollment as EnrollmentResource;
use Illuminate\Http\Request;
use App\Course\Resources\CourseCollection;
use Domain\Course\Models\Course;
use Domain\Course\Models\Enrollment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class CourseController extends Controller
{
    protected function index()
    {
        $courses = QueryBuilder::for(Course::class)
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
                'chapters',
                'chapters.sections',
                'authors',
                'tags',
            ])
            ->get();

        return new CourseCollection($courses);
    }

    protected function show($id)
    {
        $course = QueryBuilder::for(Course::class)
            ->allowedIncludes([
                'topic',
                'chapters',
                'chapters.sections',
                'authors',
                'tags',
            ])
            ->where('id', $id)
            ->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new CourseResource($course);
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
