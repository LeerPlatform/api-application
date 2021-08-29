<?php

namespace Domain\Language\Models;

use Domain\Model;
use Spatie\Translatable\HasTranslations;

class Language extends Model
{
    use HasTranslations;

    protected $table = 'languages';

    public array $translatable = [
        'display_name',
    ];
}
