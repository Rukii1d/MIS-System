<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PasswordConfirmController extends Controller
{
    public function check(Request $request)
    {
        $user = Auth::user();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
