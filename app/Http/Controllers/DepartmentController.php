<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dept-management.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request,[
            'number'=>'required',
            'name'=>'required',
             'email'=>'required',
             'firstname'=>'required'
        ]);
       
        $post=new Department;
        $post->number=$request->input('number');
        $post->name=$request->input('name');
        $post->email=$request->input('email');
        $post->firstname=$request->input('firstname');
        $post->save();
        return redirect('admin/dept/view')->with('success','Department Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $depts = Department::all();
        return view('dept-management.view')->with('depts',$depts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dept = Department::find($id);
        if ($dept == null) {
            return redirect('admin/dept/view');
        }
        return view('dept-management.edit')->with('dept', $dept);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, 
        ['number' => 'required',
         'name' => 'required',
         'email'=>'required',
         'firstname'=>'required'
         ]);
        $dept= Department::find($request->id);
        $dept->number=$request->input('number');
        $dept->name=$request->input('name');
        $dept->email=$request->input('email');
        $dept->firstname=$request->input('firstname');
        $dept->save();
        return redirect('admin/dept/view')->with('success',"Department Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dept = Department::find($id);
        if ($dept == null || count($dept) == 0) {
            return redirect('admin/dept/view');
        }
        Department::where('id', $id)->delete();
        return redirect('admin/dept/view')->with('success','Department Deleted!!');
    }
}