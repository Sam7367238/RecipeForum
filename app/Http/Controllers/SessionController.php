<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view("authentication.login");
    }

    public function store(Request $request) {
        $attributes = $request -> validate([
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($attributes, true)) {
            $request -> session() -> regenerate();

            return redirect('/') -> with("status", "Authentication Successful");
        }

        throw ValidationException::withMessages(["email" => "Credentials do not match."]);
    }

    public function destroy() {
        Session::flush();
        Auth::logout();

        return redirect('/') -> with("status", "You Have Been Logged Out");
    }
}
