<?php

namespace Domain\Language\Models;

use Domain\Model;
use Spatie\Translatable\HasTranslations;

class Language extends Model
{
    use HasTranslations;

    protected $table = 'languages';

    public $translatable = [
        'display_name',
    ];
}
