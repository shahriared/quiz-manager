<?php

namespace Shahriared\QuizManager\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Shahriared\QuizManager\QuizManager
 */
class QuizManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Shahriared\QuizManager\QuizManager::class;
    }
}
