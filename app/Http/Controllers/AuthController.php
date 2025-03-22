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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1, 
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
    function showLogin()
    {
        return view('auth.login');
    }
    function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('Dashboard');
        } else {
            return redirect()->back()->withErrors(['gagal', 'Email Atau Password Salah']);
        }
    }
    function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
