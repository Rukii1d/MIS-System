<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function reda()
    {
        $fullname = auth()->user()->name;
        return view('userdash.reda', compact('fullname'));
    }

    public function redaacademy()
    {
        return view('redaacademy');
    }

    public function redamanpower()
    {
        return view('redamanpower');
    }

    public function redaenterprise()
    {
        return view('redaenterprise');
    }

    public function redaestablishment()
    {
        return view('redaestablishment');
    }

    public function redafinance()
    {
        return view('finance');
    }

    // New method to verify login password for accessing sections
    public function verifySectionPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'url' => 'required',
        ]);

        $user = auth()->user();

        // Admin bypass
        if ($user->role === 'admin') {
            return response()->json(['success' => true, 'url' => $request->url]);
        }

        // Check user login password
        if (Hash::check($request->password, $user->password)) {
            return response()->json(['success' => true, 'url' => $request->url]);
        }

        return response()->json(['success' => false, 'message' => 'Incorrect password!']);
    }
}
