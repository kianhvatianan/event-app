<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MemberAuthController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        return view('member.auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
        ]);

        Auth::login($user);
        return redirect()->route('member.dashboard');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('member.auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('member.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }



    // Logout member
    public function logout()
    {
        Auth::logout();
        return redirect()->route('member.login');
    }
}
