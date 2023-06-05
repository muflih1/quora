<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function showAnsers(User $user)
    {
        return view('users.showansers', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        if ($user->id !== auth()->id()) {
            abort(403, "Unauthorized");
        }

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $user->profile_image = $request->file('profile_image')->store('profile_images', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $user->profile_image = $request->file('cover_image')->store('cover_images', 'public');
        }

        $user->update($request->all() + [
            'profile_image' => $user->profile_image,
        ]);

        return redirect()->route('users.show', $user);
    }
}
