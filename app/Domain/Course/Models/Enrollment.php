<?php

namespace Domain\Course\Models;

use Domain\Model;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Enrollment extends Model
{
    protected $table = 'course_enrolled';

    public function student(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_enrolled', 'course_id', 'user_id');
    }

    public function course(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_enrolled', 'user_id', 'course_id');
    }
}
