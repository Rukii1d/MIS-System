<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function index()
    {
        $fullname = auth()->user()->name ?? 'Guest';
        return view('academy.index', compact('fullname'));
    }
}
