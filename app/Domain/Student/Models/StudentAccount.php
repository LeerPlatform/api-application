<?php

namespace Domain\Student\Models;

use Domain\User\Models\User;
use Domain\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAccount extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
