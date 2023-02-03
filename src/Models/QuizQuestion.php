<?php

namespace Shahriared\QuizManager\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class QuizQuestion extends Model
{
    use HasTranslations;
    
    public $translatable = ['title', 'hint'];

    protected $table = 'quiz_questions';

    protected $fillable = ['quiz_id', 'title', 'hint', 'type', 'options', 'is_published'];

    protected $casts = [
        'options' => 'array',
    ];

    public function quiz()
    {
        return $this->hasOne(Quiz::class, 'quiz_id');
    }

}
