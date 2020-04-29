<?php

namespace App\Course\QueryBuilder;

use Spatie\QueryBuilder\Sorts\Sort;
use Illuminate\Database\Eloquent\Builder;

class PopularSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC' : 'ASC';

        $query->withCount('students');

        $query->orderBy('students_count');
        $query->orderBy('unique_views_count');
    }
}
