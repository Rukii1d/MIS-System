<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show registration form (optional if separate view)
    public function showRegister()
    {
        return view('register');  // your register blade
    }

    // Handle registration POST
    public function registerUser(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'file' => 'required|image|mimes:jpg,png|max:2048',
            'password' => 'required|string|min:4',
        ]);

        // Handle file upload
        $filename = null;
        if ($request->hasFile('file')) {
            $filename = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('uploads'), $filename);
        }

        // Create new user with hashed password and default type User
        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $filename,
            'type' => 'User',
            'status' => 'Active',
        ]);

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // Show login form
    public function showLogin()
    {
        return view('login');  // your login blade
    }

    // Handle login POST
    public function loginUser(Request $request)
    {
        // Validate login inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // prevent session fixation
            return redirect()->intended('dashboard'); // or wherever after login
        }

        // Authentication failed
        return back()->with('error', 'Invalid email or password')->withInput();
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
