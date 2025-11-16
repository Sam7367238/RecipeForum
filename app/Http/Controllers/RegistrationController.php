<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function create() {
        return view("authentication.register");
    }

    public function store(Request $request) {
        $attributes = $request -> validate([
            "name" => ["required", "max:255"],
            "email" => ["required", "email", "max:255"],
            "password" => ["required", Password::min(8)]
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/') -> with("status", "Registration Successful");;
    }
}
