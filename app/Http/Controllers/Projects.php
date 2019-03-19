<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class Projects extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
    public function showProjects(){
        $projects=Project::All();
        return view('task-management.project')->with(compact('projects'));
    }
    public function showProject(Request $request){
        $id=$request->id;
        $projects=Project::where('id',$id)->first();
        return response()->json(['project'=>$projects->task_name,'description'=>$projects->description,'customer'=>$projects->customer_name,'location'=>$projects->location,'contact'=>$projects->contact,'email'=>$projects->email,'days'=>$projects->days,'start'=>$projects->start,'end'=>$projects->end]);
    }
    public function terminateProject(Request $request){
        Project::where('id',$request->id)->delete();
        Task::where('id',$request->taskid)->delete();
        return response("deleted successfully");
    }
}
