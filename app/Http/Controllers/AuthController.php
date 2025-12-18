<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() 
    { 
        if(Session::has('user_id')){
            return redirect()->route('home');
        }
        return view('login'); 
    }

    public function showSignup() 
    { 
        if(Session::has('user_id')){
            return redirect()->route('home');
        }
        return view('signup'); 
    }

    public function signup(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'user_type' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->save();

        return redirect()->route('login')->with('message', 'Registration successful! Please login.');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('user_email', $user->email);
            Session::put('user_type', $user->user_type);

            if($user->user_type == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('message', 'Invalid email or password');
    }

    public function logout() 
    {
        Session::flush();
        return redirect()->route('index');
    }
}