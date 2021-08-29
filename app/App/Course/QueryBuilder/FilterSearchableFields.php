<?php

namespace App\Course\QueryBuilder;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterSearchableFields implements Filter
{
    protected array $searchableColumns = [];

    public function setSearchableColumns($columns): self
    {
        $this->searchableColumns = $columns;

        return $this;
    }

    public function __invoke(Builder $query, $value, string $property)
    {
        $query->search($this->searchableColumns, $value);
    }

    public static function searchOn(...$columns): FilterSearchableFields
    {
        return (new static)->setSearchableColumns($columns);
    }
}
