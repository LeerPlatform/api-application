<?php

namespace App\Course\Controllers;

use Domain\Course\Models\Unit;
use Illuminate\Http\Request;
use App\Course\Resources\Unit as UnitResource;
use App\Course\Resources\UnitCollection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class UnitController extends Controller
{
    public function index(): UnitCollection
    {
        $units = QueryBuilder::for(Unit::class)
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

        return new UnitCollection($units);
    }

    public function store(Request $request): UnitResource
    {
        $request->validate([
            'slug' => ['required', 'string', 'unique:units'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'course_id' => ['required', 'integer'],
        ]);

        $unit = new Unit();
        $unit->course_id = $request->input('course_id');
        $unit->slug = $request->input('slug');
        $unit->title = $request->input('title');
        $unit->description = $request->input('description');
        $unit->save();

        return (new UnitResource($unit))
            ->additional([
                'message' => 'Unit created successfully.',
            ]);
    }

    public function show(Unit $unit): UnitResource
    {
        $unit = QueryBuilder::for(Unit::class)
            ->allowedIncludes([
                'course',
                'sections',
            ])
            ->where('id', $unit->getKey())
            ->first();

        return new UnitResource($unit);
    }

    public function update(Request $request, Unit $unit): UnitResource
    {
        $request->validate([
            'slug' => ['required', 'string', 'unique:units'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'course_id' => ['required', 'integer'],
        ]);

        $unit->course_id = $request->input('course_id');
        $unit->slug = $request->input('slug');
        $unit->title = $request->input('title');
        $unit->description = $request->input('description');
        $unit->save();

        return (new UnitResource($unit))
            ->additional([
                'message' => 'Unit updated successfully.',
            ]);
    }

    public function destroy(Unit $unit): UnitResource
    {
        $unit->delete();

        return (new UnitResource($unit))
            ->additional([
                'message' => 'Unit deleted successfully.',
            ]);
    }
}
