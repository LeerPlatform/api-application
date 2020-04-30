<?php

namespace Domain\Course\Models;

use Domain\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    public function unit(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'unit_section', 'section_id', 'unit_id');
    }
}
