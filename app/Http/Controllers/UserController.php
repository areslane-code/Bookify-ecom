<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create(Request $request)
    {
        return view("users.create", []);
    }

    public function store(Request $request)
    {


        $data = $request->validate([
            'nom' => ['required'],
            'prenom' => ['required', ""],
            'telephone' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ]);




        $user = new User();

        $user->lastname = $data["nom"];
        $user->firstname = $data["prenom"];
        $user->phoneNumber = $data["telephone"];
        $user->email = $data["email"];
        $user->password = Hash::make($data["password"]);
        $user->role = 0;


        $user->save();

        return redirect("/login");
    }

    public function loginShow(Request $request)
    {
        return view("users.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', "min:8"],
            [
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez saisir une adresse email valide.',
                'password.required' => 'Le champ mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            ]
        ]);

        // Check if the user exists and has the role of
        if (Auth::attempt($credentials)) {
            // Retrieve user by email
            $user = User::where('email', $request->email)->first();
            if (Auth::user()->role === 0) {
                // Allow login
                return redirect()->intended();
            } else if (Auth::user()->role === 1 || Auth::user()->role === 2) {
                // Deny login
                Auth::logout();
                return redirect()->back()->withErrors(['general' => 'Vous ne pouvez pas vous connecter avec un compte admin/libraire ici']);
                // this is if i want to allow login and redirect direclty to the pannel
                // return redirect("/panel");
            }
        } else {
            return redirect()->back()->withErrors(['general' => 'Email ou mot de passe est incorrect']);
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
