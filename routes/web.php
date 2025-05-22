<?php

use App\Http\Controllers\CustomAuthcontroller;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('register');
});

Route::get('/login', function () {

    return view('Login');
});

Route::post('register-user', [CustomAuthcontroller::class, 'registeruser'])->name('register-user');

Route::post('Login-user', [CustomAuthcontroller::class, 'Loginuser'])->name('Login-user');



Route::get('/Dashboard', function () {
    $users = User::all();
    $totalUsers = $users->count();
    return view('Dashboard', compact('users', 'totalUsers'));
})->name('Dashboard');
