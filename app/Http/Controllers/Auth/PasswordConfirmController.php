<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordConfirmController extends Controller
{
    public function confirm(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = auth()->user();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
