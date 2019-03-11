<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Accounts;
use App\Requests;
class Requisition extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function showForm()
{
$expenses=Accounts::All();
return view('user-management.user-request')->with(compact('expenses'));
}
//send user requisition
    public function sendRequest(Request $request)
    {
         $requisition=new Requests;
         $requisition->user=Auth::user()->firstname;
         $requisition->user_id=Auth::user()->id;
         $requisition->expense=$request->input("expense");
         $requisition->purpose=$request->input("purpose");
         $requisition->amount=$request->input("amount");
         $requisition->status=0;
         $requisition->save();
         return response('Request Sent!!');
    }
   
}
