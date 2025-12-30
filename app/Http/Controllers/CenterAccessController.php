<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CenterAccessController extends Controller
{
    public function check(Request $request)
    {
        $target = $request->input('target');
        $password = $request->input('password');

        // If the logged-in user is admin, allow immediately
        $user = Auth::user();
        if ($user && isset($user->role) && $user->role === 'admin') {
            return response()->json(['success' => true, 'redirect' => $target]);
        }

        // Server-side password from .env (default fallback '1234')
        $expected = env('CENTER_ACCESS_PASS', '1234');

        if ($password === $expected) {
            return response()->json(['success' => true, 'redirect' => $target]);
        }

        return response()->json(['success' => false, 'message' => 'Incorrect password.'], 422);
    }
}
