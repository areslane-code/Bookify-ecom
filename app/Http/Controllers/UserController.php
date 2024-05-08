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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:10',
            'email' => 'required|email|max:255|unique:users,email',
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
            'email' => 'required|email|max:255',
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

    public function edit()
    {
        $user = auth()->user();
        return view("users.edit", compact("user"));
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
        ]);

        // Get the currently authenticated user
        $user = User::find(auth()->id());

        // Check if the old password matches the user's current password
        if (Hash::check($data["oldPassword"], $user->password)) {
            // Update the user's password with the new one
            $user->password = Hash::make($data["newPassword"]);
            $user->save();
            return back();
        } else {
            return back()->withErrors(['password_incorrect' => "l'ancien mot de passe est incorrect."]);
        }
    }

    public function updateInfos(Request $request)
    {

        $data = $request->validate([
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:10|min:10',
            'email' => 'email|nullable|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = User::find(auth()->id());

        if ($request->has('nom') && isset($data["nom"])) {
            $user->lastname = $data["nom"];
        }

        if ($request->has('prenom') && isset($data["prenom"])) {
            $user->firstname = $data["prenom"];
        }

        if ($request->has('telephone') && isset($data["telephone"])) {
            $user->phoneNumber = $data["telephone"];
        }

        if ($request->has('email') && isset($data["email"])) {
            if ($user->email !== $data["email"]) {
                $user->email = $data["email"];
            }
        }

        $user->save();

        return back()->with("message", "Votre informations sont modifié");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
