<?php

namespace Shahriared\QuizManager\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Shahriared\QuizManager\Models\Quiz;
use Shahriared\QuizManager\Models\QuizQuestion;

class QuizController
{
    public static function getAll()
    {
        return Quiz::all();
    }

    public static function create($data)
    {
        $validatedData = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
            'max_point' => 'required|numeric',
            'url' => 'nullable',
            'is_published' => 'required|boolean',
        ])->validate();
        
        return Quiz::create($validatedData);
    }

    public static function update($data)
    {
        $validatedData = Validator::make($data, [
            'id' => 'required|exists:quizzes,id',
            'name' => 'required',
            'description' => 'required',
            'max_point' => 'required|numeric',
            'url' => 'nullable',
            'is_published' => 'required|boolean',
        ])->validate();
        
        return Quiz::where(['id' => $validatedData['id']])->update($validatedData);
    }
    
    public static function delete($id)
    {
        QuizQuestion::where(['quiz_id' => $id])->delete();
        return Quiz::where(['id' => $id])->delete();
    }

    public static function addQuestion($id, $data)
    {
        if (!Quiz::find($id)) {
            return null;
        }
        $validatedData = Validator::make($data, [
            'title' => 'required',
            'type' => 'required',
            'is_published' => 'required|boolean',
            'options' => 'required|array',
        ])->validate();

        $temp = [];
        $temp['quiz_id'] = $id;
        $temp['title'] = $data['title'];
        $temp['hint'] = $data['hint'];
        $temp['type'] = $data['type'];
        $temp['is_published'] = $data['is_published'];
        $temp['options'] = $data['options'];

        return QuizQuestion::create($temp);
    }

    public static function deleteQuestion($quiz_id, $quiz_question_id)
    {
        if (!Quiz::find($quiz_id)) {
            return null;
        }

        $image = QuizQuestion::where('id', '=', $quiz_question_id)->where('quiz_id', '=', $quiz_id)->firstOrFail();
        Storage::delete($image->image);
        $image->delete();

        return true;
    }
}
