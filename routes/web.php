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
    $totalUsers = User::all()->count();
    return view('Dashboard', ['totalUsers' => $totalUsers]);
})->name('Dashboard');
