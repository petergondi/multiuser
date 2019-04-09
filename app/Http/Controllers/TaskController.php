<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
use App\Customer;
use App\User;
use App\Reply;
use App\Activity;

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
    //function for posting task to both task table 
    public function storeTask(Request $request)
    {
         $activity_id=Task::max('id');
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
        //posting to customer if they dont exist
        $check_customer=Customer::where('email',$request->input('email'))->first();
        if(!$check_customer)
        {
            $customer=new Customer;
            $customer->customer_name=$request->input('customer_name');
            $customer->location=$request->input('location');
            $customer->contact=$request->input('contact');
            $customer->email=$request->input('email');
            $customer->save();
        }
         
        //posting data to activities
        $activity=new Activity;
        $activity->activity=$request->input('task_name');
        $activity->status="pending";
        $activity->comment="no comment";
        $activity->user_id=$request->input('asignee_id');
        $activity->activity_id=$activity_id+1;
        $activity->save();
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
    public function showSingleTask($id)
    {
        $check_tasks=Task::find($id);
        if($check_tasks->count()>0){
            return view('task-management.usertask-show')->with(compact('check_tasks'));
        }
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
     //delete task and its related activities and replies
     public function destroy($id)
     {
            Task::where('id', $id)->delete();
            Activity::where('id', $id)->delete();
            $chats=Reply::where('task_id', $id)->get();
            if($chats->count()>0){
                Reply::where('task_id', $id)->delete();
            }
            return redirect('admin/tasks/view')->with('success','Task Deleted');
     }
   
    
}
