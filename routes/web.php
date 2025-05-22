<?php

use App\Http\Controllers\CustomAuthcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login');
});




Route::get('/Register', function () {

    return view('Register');
});


Route::post('register-user', [CustomAuthcontroller::class, 'registeruser'])->name('register-user');

Route::post('Login-user', [CustomAuthcontroller::class, 'Loginuser'])->name('Login-user');

Route::get('/Dashboard', function () {
    return view('Dashboard');
})->name('Dashboard');
