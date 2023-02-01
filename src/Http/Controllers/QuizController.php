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
            'name' => 'required|max:255',
            'description' => 'required',
            'is_published' => 'required|boolean',
        ])->validate();
        
        return Quiz::create($validatedData);
    }

    public static function update($data)
    {
        $validatedData = Validator::make($data, [
            'id' => 'required|exists:quizzes,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'is_published' => 'required|boolean',
        ])->validate();
        
        return Quiz::where(['id' => $validatedData['id']])->update($validatedData);
    }
    
    public static function delete($id)
    {
        $images = QuizQuestion::where('quiz_id', '=', $id)->get();
        foreach ($images as $img) {
            Storage::delete($img->image);
        }
        return Quiz::where(['id' => $id])->delete();
    }

    public static function addImage($id, $data)
    {
        if (!Quiz::find($id)) {
            return null;
        }
        $validatedData = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required',
            'alt' => 'required',
            'file' => 'required',
        ])->validate();

        $temp = [];
        $temp['quiz_id'] = $id;
        $temp['name'] = $validatedData['name'];
        $temp['description'] = $validatedData['description'];
        $temp['alt'] = $validatedData['alt'];
        $temp['image'] = null;


        $imageFile = $validatedData['file'];
        $imagePath =  $imageFile->store('public/quiz-images');

        if ($imagePath) {
            $temp['image'] = $imagePath;
            return QuizQuestion::create($temp);
        } 
        
        return null;
    }

    public static function deleteImage($quiz_id, $quiz_question_id)
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
