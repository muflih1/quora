<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Following;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class FollowController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $exist = Follow::where('user_id', Auth::id())->where('follower_id', $user->id)
            ->first();

        if (!$exist) {
            $follow = Follow::create([
                'user_id' => Auth::id(),
                'follower_id' => $user->id,
            ]);

            $following = Following::create([
                'user_id' => $user->id,
                'follower_id' => Auth::id(),
            ]);
            
            return redirect()->back();
        } else {
            $exist->delete();
            
            Following::where('user_id', $user->id)->where('follower_id', Auth::id())->first()->delete();
            
            return redirect()->back();
        }
    }

    public function storeQuestion(Question $question)
    {
        $exist = Follow::where('user_id', Auth::id())->where('question_id', $question->id)->first();

        if (!$exist) {
            $follow = Follow::create([
                'user_id' => Auth::id(),
                'question_id' => $question->id,
            ]);

            $following = Following::create([
                'user_id' => Auth::id(),
                'question_id' => $question->id,
            ]);

            return redirect()->back();
        } else {
            $exist->delete();

            Following::where('user_id', Auth::id())->where('question_id', $question->id)->first()->delete();

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
