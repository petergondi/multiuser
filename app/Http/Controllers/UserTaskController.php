<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Tasks;
use App\Task;
use App\Customer;
use App\User;
use App\Reply;

class UserTaskController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function userTask(){
        $userlogged=Auth::user()->id;
       // checking for authenticated user's task 
           $usertasks=Task::where('asignee_id', $userlogged)->orderBy('id','desc')->get();
           if($usertasks->count()>0){
            $usernew_task=Task::where('asignee_id',$userlogged)->where('status','no')->count();
               return view('task-management.usertask')->with(compact('usertasks','usernew_task','userlogged')); 
        }
        //for debbugin purposes to be removed later
       else{
          return view('task-management.nousertask');
        }
        
    }
    //show quotations 
    public function quotations(){
        $userlogged=Auth::user()->id;
        // checking for authenticated user's quotation 
            $quotations=Task::where('asignee_id', $userlogged)->where('reason','quotation')->orWhere('reason','invoice')->orderBy('id','desc')->get();
            if( $quotations->count()>0){
             $usernew_quotations=Task::where('asignee_id',$userlogged)->where('reason','quotation')->count();
             $usernew_invoice=Task::where('asignee_id',$userlogged)->where('reason','invoice')->count();
             return view('task-management.quotations')->with(compact('quotations','usernew_quotations','usernew_invoice','userlogged')); 
         }
         //for debbugin purposes to be removed later
        else{
           return view('task-management.nousertask');
         }
        
    }
    //show specific quotation
    public function showQuotation($id)
    {
     $quotation=Task::find($id);
     return view('task-management.quotation',compact('quotation'));
    }
  
}
