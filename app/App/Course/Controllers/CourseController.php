<?php

namespace App\Course\Controllers;

use App\Course\Resources\Course as CourseResource;
use App\Course\Resources\Enrollment as EnrollmentResource;
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
