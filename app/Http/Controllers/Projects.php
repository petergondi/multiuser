<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

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
}
