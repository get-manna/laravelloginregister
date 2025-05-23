<?php

use App\Http\Controllers\CustomAuthcontroller;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Postcontroller;



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


Route::get('/create', [postcontroller::class, 'create']);
Route::post('/store', [postcontroller::class, 'ourstore'])->name('store');

Route::get('/Edit/{id}', [postcontroller::class, 'Editdata'])->name('Edit');

Route::post('/update/{id}', [postcontroller::class, 'updatedata'])->name('update');

Route::get('/Delete/{id}', [postcontroller::class, 'Deletedata'])->name('Delete');




Route::get('/createpost',function () {
    return view('createpost');
});
