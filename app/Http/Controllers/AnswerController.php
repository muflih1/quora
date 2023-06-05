<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AnswerController extends Controller
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
    public function create(string $id)
    {
        $question = Question::find($id);

        return  view('answers.create', [
            'question' => $question,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $question_id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $existing_answer = Answer::where('question_id', $question_id)->where('user_id', auth()->id())->first();

        if (!isset($existing_answer)) {
            $answer = Answer::create([
                'user_id' => auth()->id(),
                'question_id' => $question_id,
                'content' => $request->content,
            ]);

            return redirect()->route('questions.show', $question_id);
        } else {
            return redirect()->route('questions.show', $question_id)->withErrors('answer_error_message', 'You may only write one answer for each question, but you can edit your existing answer.');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Question $question)
    {
        $answer = Answer::where('question_id', $question)->where('user_id', $user)->first();
        
        return view('answers.create', [
            'answer' => $answer,
            'question' => $question,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        if ($answer->user == auth()->user()) {
            $answer->delete();
    
            return redirect()->back()->with('message', 'Answer has been deleted');
        } else {
            return abort(403, 'Unauthorized');
        }

    }
}
