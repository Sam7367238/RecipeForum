<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("guest") -> group(function() {
    Route::get("/register", [RegistrationController::class, "create"]) -> name("register");
    Route::post("/register", [RegistrationController::class, "store"]) -> name("register.store") -> middleware("throttle:6,1");
    Route::get("/login", [SessionController::class, "create"]) -> name("login");
    Route::post("/login", [SessionController::class, "store"]) -> name("login.store");
});

Route::middleware("auth") -> group(function() {
    Route::delete("/logout", [SessionController::class, "destroy"]) -> name("session.destroy");
});