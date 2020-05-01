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
use App\Topic\QueryBuilder\PopularSort;

final class TopicController extends Controller
{
    public function index()
    {
        $topics = QueryBuilder::for(Topic::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('slug'),
                'display_name',
                'description',
            ])
            ->allowedSorts([
                AllowedSort::custom('popular', new PopularSort(), '')
            ])
            ->allowedIncludes([
                'courses',
            ])
            ->get();

        return new TopicCollection($topics);
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => ['required', 'string', 'unique:topics'],
            'display_name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $topic = new Topic();
        $topic->slug = $request->input('slug');
        $topic->display_name = $request->input('display_name');
        $topic->description = $request->input('description');
        $topic->save();

        return (new TopicResource($topic))
            ->additional([
                'message' => 'Topic created successfully.',
            ]);
    }

    public function show(Topic $topic)
    {
        $topic = QueryBuilder::for(Topic::class)
            ->allowedIncludes([
                'courses',
            ])
            ->where('id', $topic->getKey())
            ->first();

        return new TopicResource($topic);
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'slug' => ['required', 'string', 'unique:topics'],
            'display_name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $topic->slug = $request->input('slug');
        $topic->display_name = $request->input('display_name');
        $topic->description = $request->input('description');
        $topic->save();

        return (new TopicResource($topic))
            ->additional([
                'message' => 'Topic updated successfully.',
            ]);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return (new TopicResource($topic))
            ->additional([
                'message' => 'Topic deleted successfully.',
            ]);
    }
}
