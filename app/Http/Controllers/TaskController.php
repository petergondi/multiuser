<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
use App\Customer;
use App\User;
use App\Reply;

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
        $assignees=User::All();
        $customers=Customer::All();
        return view('task-management.create')->with(compact('assignees','customers'));
    }
    //function for posting task to both task table and customer
    public function storeTask(Request $request)
    {
        //
         $this->validate($request,[
            'medium'=>'required', 
            'reason'=>'required', 
            'task_name'=>'required', 
            'description'=>'required', 
            'customer_name'=>'required',
            'location'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'asignee_id'=>'required'
        ]);
        $task=new Task;
        $task->medium=$request->input('medium');
        $task->response=0;
        $task->reason=$request->input('reason');
        $task->task_name=$request->input('task_name');
        $task->description=$request->input('description');
        $task->customer_name=$request->input('customer_name');
        $task->location=$request->input('location');
        $task->contact=$request->input('contact');
        $task->email=$request->input('email');
        $task->asignee_id=$request->input('asignee_id');
        $task->status="no";
        $task->save();
        return redirect('admin/tasks/view')->with('success','Task Assigned');
        
    }
    //pupolate customers in task assign text fields
    public function populateCustomers($id){
            $selected_details=Customer::where("id",$id)->first();
            $email=$selected_details->email;
            $contact=$selected_details->contact;
            $location=$selected_details->location;
           return response()->json(['email'=>$email,'contact'=>$contact,'location'=>$location]); 
    }
    //showing assigned tasks to admin
    public function show(){
        $tasks = Task::with('user')->orderBy('id','desc')->paginate(6);
        return view('task-management.view')->with(compact('tasks'));
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
     //function for updating both task table and customers of  table
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
            $task=Task::find($id);
            $task->task_name=$request->input('task_name');
            $task->description=$request->input('description');
            $task->customer_name=$request->input('customer_name');
            $task->location=$request->input('location');
            $task->contact=$request->input('contact');
            $task->email=$request->input('email');
            $task->asignee_id=$request->input('asignee_id');
            $task->save();
            return redirect('admin/tasks/view')->with('success','Task Updated');   
     }
     public function destroy($id)
     {
            Task::where('id', $id)->delete();
            return redirect('admin/tasks/view')->with('success','Task Deleted');
     }
     //showing customers
     public function customers(){
         $customers= Customer::paginate(3);
         return view('customers.view')->with('customers',$customers);
     }
    
}
