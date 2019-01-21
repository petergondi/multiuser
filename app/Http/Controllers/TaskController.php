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
    //function for posting task to both task table and assignee of the task table
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
        return redirect('admin/tasks/view')->with('success','Task Assigned');
        
    }
    public function show(){
        $tasks=Task::paginate(3);;
        return view('task-management.view')->with('tasks',$tasks);
    }
    //editing tasks
    public function edit($id)
    {
        //
        $task = Task::find($id);
        if ($task == null) {
            return redirect('admin/tasks/view');
        }
        return view('task-management.edit')->with('task', $task);
    }
     //function for posting task to both task table and assignee of the task table
     public function update(Request $request,$id)
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
        
         if( $assigned=Assignee::find($id)){
            $assigned->asignee_name=$request->input('asignee_name');
            $assigned->task_name=$request->input('task_name');
            $assigned->customer_name=$request->input('customer_name');
            $task=Task::find($id);
            $task->task_name=$request->input('task_name');
            $task->description=$request->input('description');
            $task->customer_name=$request->input('customer_name');
            $task->location=$request->input('location');
            $task->contact=$request->input('contact');
            $task->email=$request->input('email');
            $task->asignee_name=$request->input('asignee_name');
            $task->save();
            $assigned->save(); 
            return redirect('admin/tasks/view')->with('success','Task Updated');
         }
         else{
            $assigned=new Assignee;
            $assigned->asignee_name=$request->input('asignee_name');
            $assigned->task_name=$request->input('task_name');
            $assigned->customer_name=$request->input('customer_name');
            $task=Task::find($id);
            $task->task_name=$request->input('task_name');
            $task->description=$request->input('description');
            $task->customer_name=$request->input('customer_name');
            $task->location=$request->input('location');
            $task->contact=$request->input('contact');
            $task->email=$request->input('email');
            $task->asignee_name=$request->input('asignee_name');
            $task->save();
            $assigned->save();
            return redirect('admin/tasks/view')->with('success','Task Updated');
        }
         
         
     }
     public function destroy($id)
     {
         //delete both records from assignee and task table
         if(Assignee::where('id', $id)){
            Task::where('id', $id)->delete();
            Assignee::where('id', $id)->delete();
            return redirect('admin/tasks/view')->with('success','Task Deleted');
         }
         //incase in inconsistent id delete only the record in task table
         else{
            Task::where('id', $id)->delete();
            return redirect('admin/tasks/view')->with('success','Task Deleted');
         }
        
     }
   
}
