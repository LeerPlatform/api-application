<?php

namespace App\Language\Controllers;

use App\Language\Resources\Language as LanguageResource;
use App\Language\Resources\LanguageCollection;
use Domain\Language\Models\Language;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Support\Controller;

final class LanguageController extends Controller
{
    public function index(): LanguageCollection
    {
        $courses = QueryBuilder::for(Language::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'display_name',
                AllowedFilter::exact('locale'),
                AllowedFilter::exact('script'),
                AllowedFilter::exact('regional'),
            ])
            ->allowedSorts([
                'created_at',
            ])
            ->jsonPaginate();

        return new LanguageCollection($courses);
    }

    public function show($id): LanguageResource
    {
        $course = QueryBuilder::for(Language::class)
            ->where('id', $id)
            ->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new LanguageResource($course);
    }
}
