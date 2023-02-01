<?php

use Illuminate\Support\Facades\Route;
use Shahriared\QuizManager\Http\Controllers\QuizController;
use Shahriared\QuizManager\Http\Controllers\QuizQuestionController;

Route::group([
    'middleware' => config('quiz-manager.middleware', ['web']),
    'domain' => config('quiz-manager.domain', null),
    'prefix' => config('quiz-manager.prefix'),
], function () {
    Route::prefix('quiz-manager')->group(function () {
        Route::resource('quiz', QuizController::class);;
        Route::resource('quiz-question', QuizQuestionController::class);;
    });
});
