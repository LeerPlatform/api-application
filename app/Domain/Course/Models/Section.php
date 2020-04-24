<?php

namespace Domain\Course\Models;

use Domain\Model;

class Section extends Model
{
    public function unit()
    {
        return $this->belongsToMany(Unit::class, 'unit_section', 'section_id', 'unit_id');
    }
}
