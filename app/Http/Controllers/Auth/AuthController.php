<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function showRegisterForm()
    {
        // if (!Auth::check() || Auth::user()->role !== 'admin') {
        //     abort(403, 'Unauthorized: Only admins can access this page.');
        // }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // if (!Auth::check() || Auth::user()->role !== 'admin') {
        //     abort(403, 'Unauthorized: Only admins can register new users.');
        // }

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,petugas,dokter,kasir',
            'nama' => 'required|string|max:255',
        ]);

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'nama' => $validated['nama'],
        ]);

        return redirect()->route('login')->with('success', 'User registered successfully. Please login with the new credentials.');
    }
}