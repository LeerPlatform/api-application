<?php

namespace Domain\Course\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Support\Period;
use Domain\Model;
use Domain\Topic\Models\Topic;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;
use Spatie\Translatable\HasTranslations;

class Course extends Model implements Viewable
{
    use InteractsWithViews;
    use HasTags;
    use HasTranslations;

    protected $table = 'courses';

    public $translatable = [
        'title',
        'headline',
        'description',
        'description_excerpt',
        'learning_points',
    ];

    protected $casts = [
        'target_audience' => 'array',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, 'course_id');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_author', 'course_id', 'user_id');
        // ->withTimestamps();
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_enrolled', 'course_id', 'user_id')
            ->withTimestamps();
    }

    public function getUniqueViewsCount()
    {
        return views($this)
            ->period(Period::subMonths(1))
            ->unique()
            ->count();
    }
}
