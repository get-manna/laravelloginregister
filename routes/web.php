<?php

use App\Http\Controllers\CustomAuthcontroller;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Postcontroller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    return view('register');
});

Route::get('/login', function () {


    // return view('Login');

    if (!Auth::check()) {
        return view('Login');
    }

    return redirect("Dashboard")->withSuccess('Opps! You do not have access');

})->name('login');




Route::post('register-user', [CustomAuthcontroller::class, 'registeruser'])->name('register-user');

Route::post('Login-user', [CustomAuthcontroller::class, 'Loginuser'])->name('Login-user');



Route::get('/Dashboard', function () {


    if (Auth::check()) {
        $users = User::all();
        $totalUsers = $users->count();

        return view('Dashboard', compact('users', 'totalUsers'));
    }

    return redirect("login")->withSuccess('Opps! You do not have access');
})->name('Dashboard');


Route::post('/store', [postcontroller::class, 'ourstore'])->name('store');

Route::post('/update/{id}', [Postcontroller::class, 'updatedata'])->name('update');

Route::delete('/posts/{id}', [PostController::class, 'Deletedata'])->name('posts.destroy');




Route::get('/createpost', function () {

    if (Auth::check()) {
        return view('createpost');
    }
    return redirect("login")->withSuccess('Opps! You do not have access');
});


Route::get('/editdata/{id}', function ($id) {
    if (Auth::check()) {
        $post = Post::findOrFail($id);
        return view('editdata', compact('post'));
    }
    return redirect("login")->withSuccess('Opps! You do not have access');
})->name('editdata');




Route::get('/allpost', function () {
    if (Auth::check()) {
        $posts = Post::all();
        return view('allpost', compact('posts'));
    }

    return redirect("login")->withSuccess('Opps! You do not have access');
});




Route::get('logout', [CustomAuthcontroller::class, 'logout'])->name('logout');
