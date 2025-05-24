<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validate
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //create
        $user = User::create($fields);

        //login
        Auth::login($user);
        //User::create($fields);


        //redirect
        return redirect('/');
    }

    public function login(Request $request)
    {
        //validate
        $fileds = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        //login
        if (Auth::attempt($fileds)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You are now logged in!');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        //redirect
    }
    
/**
 * Log the user out of the application, invalidate the session,
 * regenerate the CSRF token, and redirect to the home page.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\RedirectResponse
 */
    public function logout(Request $request)
    {
        //logout
        Auth::logout();
        //invalidate session
        $request->session()->invalidate();
        //regenerate token
        $request->session()->regenerateToken();
        //redirect
        return redirect('/');
    }
}
