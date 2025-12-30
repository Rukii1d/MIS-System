<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    //
    public function index()
    {
        if (session()->get('type') === 'Admin') {
            $user = User::find(session()->get('id'));
    
            if (!$user) {
                return redirect('/login')->with('error', 'User not found.');
            }
    
            $fullname = $user->fullname; // or $user->name depending on your DB
            return view('dashboard.index', compact('fullname'));
        }
    
        return redirect()->back()->with('error', 'Access denied.');
    }
    


    public function profile()
    {
        if(session()->get('type')=='Admin')
        {
            $user=User::find(session()->get('id'));

            return view('dashboard.profile',compact('user'));
        }
        return redirect()->back();
    }



    public function users()
    {
        if(session()->get('type')=='Admin')
        {
            $users=User::where('type','User')->get();
            return view('dashboard.users',compact('users'));
        }
        return redirect()->back();
       
    }


    public function changeUserStatus($status,$id)
    {
        if(session()->get('type')=='Admin')
        {
            $user=User::find($id);
            $user->status=$status;
            $user->save();
            return redirect()->back()->with('success','User Status Updated Successfully...!!');
        }
        return redirect()->back();

    }
    public function create()
    {
        if (session()->get('type') !== 'Admin') {
            return redirect()->route('auditmgt.index')->with('error', 'Access denied.');
        }

        return view('auditmgt.create');
    }

    
    

}
