<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Roles;

class RoleController extends Controller
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
        $roles = Roles::all();
        return view('user-management.role')->with("roles", $roles);
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
           
            'name'=>'required'
        ]);
       
        $user_role=new Roles;
        $user_role->name=$request->input('name');
        $user_role->save();
        return redirect('admin/user/role')->with('success','Role Added');
        
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
        
        //return view('dept-management.view');
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
        $role = Roles::find($id);
        if ($role == null) {
            return redirect('admin/role/view');
        }
        return view('user-management.roleedit')->with('role', $role);
        
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
        $this->validate($request,[
           
            'name'=>'required'
        ]);
       
        $user_role=Roles::find($request->id) ;
        $user_role->name=$request->input('name');
        $user_role->save();
        return redirect('admin/user/role')->with('success','Role Updated');
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
        $role = Roles::find($id);
        if ($role == null) {
            return redirect('admin/user/role');
        }
        Roles::where('id', $id)->delete();
        return redirect('admin/user/role')->with('success','Role Deleted!!');
    }
}
