<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Executive; 

class ExecutiveLoginController extends Controller
{
    //setting up middleware
    public function __construct()
    {
        $this->middleware('guest:executives',['except'=>['logout']]);
    }
    //
    public function showLoginForm(){
        return view('auth.executive-login');
    }
    public function login(Request $request){
        //validate form 
        $this->validate($request,
        ['email'=>'required|email',
          'password'=>'required|min:6'
        
        ]);
        //authenticate admin user
        $remember = $request->input('remember');
        if (Auth::guard('executives')->attempt(['email'=>$request->email,'password'=>$request->password],$request->$remember)){

        return redirect()->intended(route('executive.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    //logging out the admin only
    public function logout()
    {
        Auth::guard('executives')->logout();

        return redirect('/');
    }

}
