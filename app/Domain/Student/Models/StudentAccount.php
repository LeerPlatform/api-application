<?php

namespace Domain\Student\Models;

use Domain\User\Models\User;
use Domain\Model;

class StudentAccount extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
