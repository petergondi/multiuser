<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;

class MailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('setting.email');
    }
    public function emailform(Request $request)
    {
        $this->validate($request,[
           
            'host'=>'required',
            'from_email'=>'required',
            'from_name'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);
       
        $email=new Email;
        $email->host=$request->input('host');
        $email->from_email=$request->input('from_email');
        $email->from_name=$request->input('from_name');
        $email->username=$request->input('username');
        $email->password=$request->input('password'); 
        $email->save();
        return redirect('admin/setting/email')->with('success','Email Settings saved!!');
    }
}
