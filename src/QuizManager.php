<?php

namespace Shahriared\QuizManager;

use Shahriared\QuizManager\Http\Controllers\QuizController;

class QuizManager
{
    public function getQuizzes()
    {
        return QuizController::getAll();
    }

    public function createQuiz($data)
    {
        return QuizController::create($data);
    }

    public function updateQuiz($data)
    {
        return QuizController::update($data);
    }

    public function deleteQuiz($quiz_id)
    {
        return QuizController::delete($quiz_id);
    }

    public function addImageToQuiz($quiz_id, $data)
    {
        return QuizController::addQuestion($quiz_id, $data);
    }

    public function deleteImageFromQuiz($quiz_id, $quiz_question_id)
    {
        return QuizController::deleteQuestion($quiz_id, $quiz_question_id);
    }
}
