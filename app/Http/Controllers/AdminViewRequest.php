<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests;
use App\Notifications\RequestsResponse;
use App\Events\requestNotify;
use App\User;
class AdminViewRequest extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function showRequests(Request $request)
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
        $details = [
            'expense' => $approve_status->expense,
            'purpose' => $approve_status->purpose,
            'amount' => $approve_status->amount,
            'date' => $approve_status->created_at
        ];
       
        $approve_status->status=1;
        $approve_status->save();
        $user=User::find($approve_status->user_id);
        $user->notify(new RequestsResponse($details));
        
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
    $details = [
        'expense' => $decline_status->expense,
        'purpose' => $decline_status->purpose,
        'amount' => $decline_status->amount,
        'date' => $decline_status->created_at
    ];
    $decline_status->status=2;
    $decline_status->save();
   $user=User::find($decline_status->user_id);
    $user->notify(new RequestsResponse($details));
    event(new requestNotify("hi sent"));
    return response("declined");
    }
}
}
