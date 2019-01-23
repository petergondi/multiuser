<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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

        $users = User::All();
        return view('user-management.create')->with('users',$users);
        
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
       
         $this->validate($request,[
            'firstname'=>'required',
            'middlename'=>'required',
             'email'=>'required',
             'password'=>'required',
             'role'=>'required'
        ]);
        $role=array();
     foreach($_POST['role'] as $value) {
            $role[]=$value;
     }
        $checkData = implode(",", $role);
        $post=new User;
        $post->firstname=$request->input('firstname');
        $post->middlename=$request->input('middlename');
        $post->email=$request->input('email');
        $post->password=password_hash($request->input('password'),PASSWORD_DEFAULT);
        $post->role=$checkData;
        $post->save();
        return redirect('admin/user/view')->with('success','User Added');
        
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
        $users = User::paginate(3);
        return view('user-management.view')->with('users',$users);
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
        $user = User::find($id);
        if ($user == null) {
            return redirect('admin/user/view');
        }
        return view('user-management.edit')->with('user', $user);
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
            'firstname'=>'required',
            'middlename'=>'required',
             'email'=>'required',
             'password'=>'required',
             'role'=>'required'
        ]);
        $role=array();
     foreach($_POST['role'] as $value) {
            $role[]=$value;
     }
        $checkData = implode(",", $role);
        $user_update = User::find($id);
        $user_update->firstname=$request->input('firstname');
        $user_update->middlename=$request->input('middlename');
        $user_update->email=$request->input('email');
        $user_update->password=password_hash($request->input('password'),PASSWORD_DEFAULT);
        $user_update->role=$checkData;
        $user_update->save();
        return redirect('admin/user/view')->with('success','Updated Added');
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
        User::where('id', $id)->delete();
        return redirect('admin/user/view')->with('success','User Deleted');
    }
}
