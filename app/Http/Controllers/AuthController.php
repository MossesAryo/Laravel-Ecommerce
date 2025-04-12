<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showRegistration()
    {
        return view('auth.register');
    }
    function submitRegistration(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 1;
        $user->save();

        return redirect()->route('login');
    }
    function showLogin()
    {
        return view('auth.login');
    }
    function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($data, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('Dashboard');
        } else {
            return redirect()->back()->with('gagal', 'Email Atau Password Salah');
        }
    }
    function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
