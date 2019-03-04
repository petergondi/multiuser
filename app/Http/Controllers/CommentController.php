<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Task;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //show comment form together with tasks assigned to the assignee
    public function show($taskasigned){
        $tasks_to_comment=Task::where('id',$taskasigned)->get();
        //$users_name = Reply::with('user')->get();
        $comments =Reply::where('task_id',$taskasigned)->orderBy('created_at','ASC')->get();
        return view('task-management.adminreply')->with(compact('comments','tasks_to_comment'));
    }
    //reply to the specific task assigned to the user
    public function CommentTask(Request $request,$taskid,$userid){
       
            $this->validate($request,[
                'comment'=>'required', 
            ]);
            $reply=new Reply;
            $reply->reply=$request->input('comment');
            $reply->task_id=$taskid;
            $reply->user_id=$userid;
            $reply->save();
            $reply=$request->input('comment');
            $task=$taskid;
            $user=$userid;

            //broadcast(new MessageSentEvent($reply, $task,$user));
            return redirect()->back()->with('success','You commented to the task');

    }
}
