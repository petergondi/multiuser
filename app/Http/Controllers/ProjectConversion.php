<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Carbon\Carbon;

class ProjectConversion extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    //show the task details to be converted to project in the modal
    public function showtask(Request $request){

        $task_to_convert=Task::where('id',$request->id)->first();
        return response()->json(['task'=>$task_to_convert->task_name,'description'=>$task_to_convert->description,'customer'=>$task_to_convert->customer_name,'location'=>$task_to_convert->location,'contact'=>$task_to_convert->contact,'email'=>$task_to_convert->email,'taskid'=>$task_to_convert->id]);
    }
    //
    public function postProject(Request $request){
        $taskid=$request->taskid;
        $project_check=Project::where('taskid',$taskid)->first();
        if($project_check==true){
            return response("this is an ongoing project!!");
        }
        else{
            $project=new Project;
            $project->taskid=$request->taskid;
            $project->task_name=$request->task;
            $project->description=$request->description;
            $project->customer_name=$request->customer;
            $project->location=$request->location;
            $project->contact=$request->contact;
            $project->email=$request->email;
            $project->start=Carbon::parse($request->input('from'));
            $project->end=Carbon::parse($request->input('to'));
            $project->days=abs(strtotime(Carbon::parse($request->input('to'))) - strtotime(Carbon::parse($request->input('from'))))/86400;
            $project->note=$request->input('note');
            $project->save();
            return response("the task has been converted to project!!");
    
        }
       

    }
}
