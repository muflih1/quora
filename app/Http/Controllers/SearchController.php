<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->q;
        $users = User::where('name', 'like', '%'.$query.'%')->get();
        $questions = Question::where('title', 'like', '%'.$query.'%')->get();
        $answers = Answer::whereHas('user', function($q) use ($query) {
            $q->where('name', 'like', '%'.$query.'%');
        })->get();

        return view('search.index', compact('users', 'questions', 'answers', 'query'));
    }
}
