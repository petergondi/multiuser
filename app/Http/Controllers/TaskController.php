<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Assignee;

class TaskController extends Controller
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
        return view('task-management.create');
    }
    //function for posting task to db
    public function storeTask(Request $request)
    {
        //
         $this->validate($request,[
            'task_name'=>'required', 
            'description'=>'required', 
            'customer_name'=>'required',
            'location'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'asignee_name'=>'required'
        ]);
        $assigned=new Assignee;
        $assigned->asignee_name=$request->input('asignee_name');
        $assigned->task_name=$request->input('task_name');
        $assigned->customer_name=$request->input('customer_name');
        $task=new Task;
        $task->task_name=$request->input('task_name');
        $task->description=$request->input('description');
        $task->customer_name=$request->input('customer_name');
        $task->location=$request->input('location');
        $task->contact=$request->input('contact');
        $task->email=$request->input('email');
        $task->asignee_name=$request->input('asignee_name');
        $task->save();
        $assigned->save();
        return redirect('admin/tasks/assign')->with('success','Task Assigned');
        
    }
   
}
