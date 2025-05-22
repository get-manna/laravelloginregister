<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\user as ModelsUser;
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:12|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('success', 'You have registered successfully. Please login.');
    }


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $request->session()->put('loginId', $user->id);


            return redirect()->route('Dashboard')->with('success', 'Login successful!');
        } else {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
    }
}
