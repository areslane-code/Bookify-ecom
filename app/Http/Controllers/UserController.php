<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function create(Request $request)
    {

        return view("users.create", []);
    }

    public function loginShow(Request $request)
    {
        return view("users.login", []);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', "min:8"],
        ]);

        // Check if the user exists and has the role of
        if (Auth::attempt($credentials)) {
            // Retrieve user by email
            $user = User::where('email', $request->email)->first();
            if (Auth::user()->role === 0) {
                // Allow login
                return redirect("/");
            } else {
                // Deny login
                Auth::logout();
                return redirect()->back()->withErrors(['role' => 'Vous ne pouvez pas vous connecter avec un compte admin/libraire ici']);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
