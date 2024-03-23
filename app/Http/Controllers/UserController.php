<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(Request $request)
    {
        $id = $request->input("user_id");
        $user = User::find($id);
        $books = $user->books;

        return view("user", ["books" => $books]);
    }

    public function create(Request $request)
    {

        return view("users.create", []);
    }
}
