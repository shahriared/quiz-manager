<?php

namespace Shahriared\QuizManager\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quiz extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'description'];

    protected $table = 'quizzes';

    protected $fillable = ['name', 'max_point', 'description', 'is_published'];

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }
}
