<?php

use App\Http\Controllers\CustomAuthcontroller;
use App\Http\Middleware\IsLoggedIn;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Postcontroller;
use App\Http\Middleware\Guest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    return view('register');
});

Route::get('/login', function () {

    return view('Login');
})->name('login')->middleware(Guest::class);



Route::post('register-user', [CustomAuthcontroller::class, 'registeruser'])->name('register-user');

Route::post('Login-user', [CustomAuthcontroller::class, 'Loginuser'])->name('Login-user');



Route::get('/Dashboard', function () {

    $users = User::all();
    $totalUsers = $users->count();

    return view('Dashboard', compact('users', 'totalUsers'));
})->name('Dashboard')->middleware(IsLoggedIn::class);


Route::post('/store', [postcontroller::class, 'ourstore'])->name('store');

Route::post('/update/{id}', [Postcontroller::class, 'updatedata'])->name('update');

Route::delete('/posts/{id}', [PostController::class, 'Deletedata'])->name('posts.destroy');



Route::get('/createpost', function () {

    return view('createpost');
})->middleware(IsLoggedIn::class);


Route::get('/editdata/{id}', function ($id) {

    $post = Post::findOrFail($id);
    return view('editdata', compact('post'));
})->name('editdata')->middleware(IsLoggedIn::class);



Route::get('/allpost', function () {

    $posts = Post::all();
    return view('allpost', compact('posts'));
})->middleware(IsLoggedIn::class);



Route::get('logout', [CustomAuthcontroller::class, 'logout'])->name('logout');
