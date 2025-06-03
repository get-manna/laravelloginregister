<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\user as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Email;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthcontroller extends Controller
{

    public function Register()
    {

        return 'Register';
    }


    public function registeruser(Request $request)
    {
       $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:12|min:6',
        ]);

    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'You have registered successfully. Please login.');
    }


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
         $credentials = $request->only('email', 'password');

         if (Auth::attempt($credentials)) {

            return redirect()->intended('Dashboard')

                        ->withSuccess('You have Successfully loggedin');

        }

         return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }


    public function logout() {

        Session::flush();

        Auth::logout();

  

        return Redirect('login');

    }
}
