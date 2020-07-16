<?php

namespace Domain\Course\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Support\Period;
use Domain\Model;
use Domain\Topic\Models\Topic;
use Domain\User\Models\User;
use Domain\Language\Models\Language;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Rennokki\Rating\Traits\CanBeRated;
use Rennokki\Rating\Contracts\Rateable;

class Course extends Model implements HasMedia, Viewable, Rateable
{
    use InteractsWithMedia;
    use InteractsWithViews;
    use HasTags;
    use HasTranslations;
    use CanBeRated;

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

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function getUniqueViewsCount()
    {
        return views($this)
            ->period(Period::subMonths(1))
            ->unique()
            ->count();
    }

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('thumbnails');
    // }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
              ->width(320)
              ->height(180);
            //   ->sharpen(10);
    }
}
