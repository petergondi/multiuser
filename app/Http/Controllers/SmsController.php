<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;

class SmsController extends Controller
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
        return view('setting.sms');
    }
    public function smsform(Request $request)
    {
        $this->validate($request,[
           
            'username'=>'required',
            'sender_id'=>'required',
            'api'=>'required'
        ]);
       
        $sms=new Sms;
        $sms->username=$request->input('username');
        $sms->sender_id=$request->input('sender_id');
        $sms->api=$request->input('api');
        $sms->save();
        return redirect('admin/setting/sms')->with('success','Email Settings saved!!');
    }
}
