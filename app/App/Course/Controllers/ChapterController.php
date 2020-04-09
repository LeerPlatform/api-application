<?php

namespace App\Course\Controllers;

use Domain\Course\Models\Chapter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Course\Resources\Chapter as ChapterResource;
use App\Course\Resources\ChapterCollection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class ChapterController extends Controller
{
    protected function index()
    {
        $chapters = QueryBuilder::for(Chapter::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('slug'),
                'title',
                'description',
            ])
            ->allowedIncludes([
                'course',
                'sections',
            ])
            ->get();

        return new ChapterCollection($chapters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => ['required', 'string', 'unique:chapters'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'course_id' => ['required', 'integer'],
        ]);

        $chapter = new Chapter();
        $chapter->course_id = $request->input('course_id');
        $chapter->slug = $request->input('slug');
        $chapter->title = $request->input('title');
        $chapter->description = $request->input('description');
        $chapter->save();

        return (new ChapterResource($chapter))
            ->additional([
                'message' => 'Chapter created successfully.',
            ]);
    }

    protected function show($id)
    {
        $chapter = QueryBuilder::for(Chapter::class)
            ->allowedIncludes([
                'course',
                'sections',
            ])
            ->where('id', $id)
            ->first();

        if ($chapter === null) {
            throw new ModelNotFoundException();
        }

        return new ChapterResource($chapter);
    }
}
