<?php

namespace Domain\Course\Models;

use Domain\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'unit_section', 'unit_id', 'section_id');
    }
}
