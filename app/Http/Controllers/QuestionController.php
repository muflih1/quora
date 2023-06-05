<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $question_exists = Question::where('title', $request->title)->first();

        $validate = $request->validate([
            'title' => 'required',
        ]);

        if (!isset($question_exists)) {
            $question = Question::create($validate + [
                'user_id' => auth()->id(),
                'description' => $request->description,
            ]);
    
            return redirect()->route('questions.show', $question->id);
        } else {
            return redirect()->route('questions.show', $question_exists)
                ->with('message', 'We found your question:');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        $existing_answer = Answer::where('question_id', $question->id)->where('user_id', auth()->id())->first();
        return view('questions.show', [
            'question' => $question,
            'existing_user' => $existing_answer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
