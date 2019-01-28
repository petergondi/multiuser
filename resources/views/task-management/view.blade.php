@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
       
<div class="card">
<p class="card-header text-center font-weight-bold text-uppercase py-4">Assigned Tasks &nbsp;<span class="badge bg-info">{{$totaltask=App\Task::All()->count()}}</span></p>
<p >Unreplied Tasks:  &nbsp;<span class="glyphicon glyphicon-envelope"><span class="badge bg-warning">{{$unreplied=App\Task::where('status','no')->count()}}</span></span></p> 
            <div class="row">
                <div class="col-sm-4 pull-right">
                        <a href="/admin/tasks/assign">
                    <button type="button" class="btn btn-info add-new "><i class="fa fa-plus"></i> Assign New Task</button>
                        </a>
                </div>
            </div>
            <br/>
        <div class="card-body">
          <div id="table">
            <table class="table table-bordered table-striped table-hover">
              <tr>
            
                <th class=" bg-primary">Task Name</th>
                <th class=" bg-primary">Description</th>
                <th class=" bg-primary">Customer Name</th>
                <th class=" bg-primary">Location</th>
                <th class=" bg-primary">Contact</th>
                <th class=" bg-primary">Customer Email</th>
                <th class=" bg-primary">Assignee</th>
                <th class=" bg-primary">Status</th>
                <th class=" bg-primary">Action</th>
              </tr>
              @foreach($tasks as $task)
              <tr>
                <td class="pt-3-half" >{{$task->task_name}}</td>
                <td class="pt-3-half" >{{$task->description}}</td>
                <td class="pt-3-half" >{{$task->customer_name}}</td>
                <td class="pt-3-half" >{{$task->location}}</td>
                <td class="pt-3-half" >{{$task->contact}}</td>
                <td class="pt-3-half" >{{$task->email}}</td>
                <td class="pt-3-half" >{{$task->user->firstname}}</td>
                @if($task->status=="yes")
                <td class="pt-3-half">
                <span class="label label-primary">Replied</span>
                </td>
                @else
                <td class="pt-3-half">
                  <span class="label label-warning">Not Replied</span>
                  </td>
                  @endif
                <td><a href="/admin/tasks/edit/{{$task->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs " data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>&nbsp;&nbsp;</a>
                  {!! Form::open(['action' => ['TaskController@destroy',$task->id],'method'=>'DELETE']) !!}
                <p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                {!! Form::close() !!}
              </tr>
              @endforeach
           
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $tasks->links() }}
            </div>
          </div>
        </div>
      </div>
      @endsection