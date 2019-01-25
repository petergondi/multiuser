<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
           if($usertasks){
               return view('task-management.usertask')->with(compact('usertasks')); 
        }
        //for debbugin purposes to be removed later
       else{
          return "no page like that exist!!";
        }
        
    }
  
}
