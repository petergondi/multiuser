<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests;
class AdminViewRequest extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function showRequests()
{
$sent_requests=Requests::paginate(10);
return view('expenditure-management.requests',compact('sent_requests'));
}
//request approval
public function Approve($id){
    //check if the request has been approved
    $check_approval=Requests::where('id',$id)->first();
    if($check_approval->status==1){
        return response("you had already approved this request");
    }
    else{
        $approve_status=Requests::find($id);
        $approve_status->status=1;
        $approve_status->save();
        return response("approved");
    }
   
}
//request decline
public function Decline($id){
    $check_decline=Requests::where('id',$id)->first();
    if($check_decline->status==2){
        return response("you had already declined this request");
    }
    else{
    $decline_status=Requests::find($id);
    $decline_status->status=2;
    $decline_status->save();
    return response("declined");
    }
}
}
