<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin; 

class AdminLoginController extends Controller
{
    //setting up middleware
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }
    //
    public function showLoginForms(){
        return view('auth.admin-login');
    }
    public function login(Request $request){
        //validate form 
        $this->validate($request,
        ['email'=>'required|email',
          'password'=>'required|min:6'
        
        ]);
        //authenticate admin user
        $remember = $request->input('remember');
        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->$remember)){

        return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    //logging out the admin only
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }

}
