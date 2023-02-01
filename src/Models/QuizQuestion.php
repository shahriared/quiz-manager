<?php

namespace Shahriared\QuizManager\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table = 'quiz_questions';

    protected $fillable = ['quiz_id', 'name', 'description', 'alt', 'image'];
}
