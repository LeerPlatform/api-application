<?php

namespace Domain\Course\Models;

use Domain\Model;

class Unit extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'unit_section', 'unit_id', 'section_id');
    }
}
