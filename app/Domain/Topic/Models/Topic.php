<?php

namespace Domain\Topic\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Support\Period;
use Domain\Course\Models\Course;
use Domain\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Topic extends Model implements Viewable
{
    use InteractsWithViews;
    use HasTranslations;

    protected $table = 'topics';

    public $translatable = [
        'display_name',
        'description',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function getUniqueViewsCount()
    {
        return views($this)
            ->period(Period::subMonths(1))
            ->unique()
            ->count();
    }
}
