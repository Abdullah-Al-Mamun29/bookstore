<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() { return view('auth.login'); }
    public function showSignup() { return view('auth.signup'); }

    public function signup(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->save();
        return redirect()->route('login');
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('user_type', $user->user_type);
            return ($user->user_type == 'admin') ? redirect('/admin') : redirect('/');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function logout() {
        Session::flush();
        return redirect('/login');
    }
}