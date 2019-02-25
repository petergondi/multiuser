<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\FormSubmitted;
use App\Task;
use App\Reply;

class ReplyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    //returning reply form
    public function showReplyForm($id){
        $userid=Auth::user()->id;
        $taskassigned=Task::where('id', $id)->get();
        $comments =Reply::where('task_id',$id)->orderBy('created_at','ASC')->get();
        return view('task-management.reply')->with(compact('taskassigned','userid','comments'));
    }
    public function replyTask(Request $request,$taskid,$userid){
        //$existing_reply= Task::where('id', $taskid)->where('status', '=', 'yes')->first();
        //checking to reply only once
       // if($existing_reply){
       // return redirect('users/tasks/view')->with('error','The task has been replied');
      // }
       // else{
            $this->validate($request,[
                'reply'=>'required', 
            ]);
            Task::where('id', $taskid)->where('status', '=', 'no')->update(['status'=> 'yes']);
            $reply=new Reply;
            $reply->reply=$request->input('reply');
            $reply->task_id=$taskid;
            $reply->user_id=$userid;
            $reply->save();
            $message=$request->input('reply');
            //event(new FormSubmitted());
            //broadcast(new FormSubmitted($message));

            //return ['status' => 'Message Sent!'];
            return redirect()->back()->with('success','You commented to the assigned task');
           // }
    }
}