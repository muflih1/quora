<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome()
    {
        $answers = Answer::all();

        return view('welcome', [
            'answers' => $answers,
        ]);
    }

    public function browse()
    {   
        $questions = Question::all();

        return view('browse.browse', [
            'questions' => $questions,
        ]);
    }
}
