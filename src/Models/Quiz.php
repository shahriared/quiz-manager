<?php

namespace Shahriared\QuizManager\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = ['name', 'description', 'is_published'];

    public function images()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }
}
