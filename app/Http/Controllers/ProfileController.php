<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kpi;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Mail\Testing;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function register()
    {

    return view ('register');

    }


    public function login()
    {

    return view ('login');

    }


    public function profile()
    {
        if(session()->has('id'))
        {
            $user=User::find(session()->get('id'));
            
            return view ('profile',compact('user'));

        }
        return redirect('login');

    }

    public function testMail()
    {
        $details=[
            'title'=>"This is a testing mail",
            "message"=>"Hello this a message",
        ];
        Mail::to("")->send(new Testing($details));
    }


    public function logout()
    {

    session()->forget('id');
    session()->forget('type');
    return redirect('/');



    }




    public function loginUser(Request $data)
    {

        $user = User::where('email', $data->input('email'))->where('password', $data->input('password'))->first();
        if($user)
        {
            if($user->status=="Blocked")
            {
             return redirect('login')->with('error','Your Status is Blocked.....!!!');   
            }
            session()->put('id',$user->id);
            session()->put('type',$user->type);
            if($user->type == 'User')

            {
                return redirect('/');
            }
            else if($user->type == 'Admin')

            {
                return redirect('/admin');
            }
            
        }else
        
        {
            return redirect('login')->with('error','Email or Password is Incorrect....!!!');   


        }

    }
        






    public function registerUser(Request $data)
    {
     $newUser=new User();
     $newUser->fullname = $data->input('fullname');
     $newUser->email = $data->input('email');
     $newUser->password = $data->input('password');
     $newUser->picture = $data->file('file')->getClientOriginalName();
     $data->file('file')->move('uploads/profiles/',$newUser->picture);
     $newUser->type="User";
     if($newUser-> save())
     {
        return redirect('login')->with('success','Your Account is Ready..!!!');   
    
     }
    
    
    }



    public function updateUser(Request $data)
    {
     $user=User::find(session()->get('id'));
     $user->fullname = $data->input('fullname');
     $user->password = $data->input('password');
     if($data->file('file')!=null)
     {
        $user->picture = $data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads/profiles/',$user->picture);

     }
     if($user-> save())
     {
        return redirect()->back()->with('success','Your Account is Updated..!!!');   
    
     }
    
    
    }
    public function reda()
    {
        $user =User::find(session()->get('id'));
    
        if (!$user) {
            return redirect('/login')->with('error', 'User not found.');
        }
    
        $fullname = $user->fullname;
        return view('reda', compact('fullname'));
    }
    


    public function mis()
{
    return view('mis', compact('kpis'));
}
    


    
}




