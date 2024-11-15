<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Display the login page
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the authentication of a user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('products.view'); // Redirect to the view route
        }

        return back()->withErrors([
            'email' => 'Incorrect email or password.',
        ]);
    }

    // When the user logout, it redirect them to the login page
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
