<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerStore(Request $request)
    {
        $form_field = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6|confirmed',
        ]);

        $form_field['password'] = bcrypt($form_field['password']);

        $user = User::create($form_field);

        auth()->login($user);

        return redirect('/');
    }

    public function loginStore(Request $request)
    {
        $form_field = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $user = User::where('email', $form_field['email'])->first();

        if (!$user) return back()->withErrors(['email' => 'No Account found']);

        $passwordCoreect = Hash::check($form_field['password'], $user->password);

        if (!$passwordCoreect) return back()->withErrors(['password' => 'Incorrect password'])->onlyInput('email');

        if (auth()->attempt($form_field)) {
            $request->session()->regenerate();
            if ($request->session()->has('url.intended')) {
                $url = $request->session()->get('url.intended');
                return redirect()->to($url);
            } else {
                return redirect('/');
            }
        } else {
            return back()->withErrors(['email' => 'Email or password incorrect'])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('message', 'logged out');
    }
}
