@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
       
<div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Assigned Tasks</h3>
            <div class="row">
                <div class="col-sm-4 pull-right">
                        <a href="/admin/tasks/assign">
                    <button type="button" class="btn btn-info add-new "><i class="fa fa-plus"></i> Assign New Task</button>
                        </a>
                </div>
            </div>
            <br/>
        <div class="card-body">
          <div id="table" class="table-editable">
            <table class="table table-bordered table-responsive-md table-striped table-hover">
              <tr>
                <th class="text-center bg-primary">No</th>
                <th class="text-center bg-primary">Task Name</th>
                <th class="text-center bg-primary">Description</th>
                <th class="text-center bg-primary">Customer Name</th>
                <th class="text-center bg-primary">Location</th>
                <th class="text-center bg-primary">Contact</th>
                <th class="text-center bg-primary">Customer Email</th>
                <th class="text-center bg-primary">Assignee</th>
                <th class="text-center bg-primary">Status</th>
                <th class="text-center bg-primary">Remove</th>
              </tr>
              @foreach($tasks as $task)
              <tr>
                  
                <td class="pt-3-half" contenteditable="true">{{$task->id}}</td>
                <td class="pt-3-half" contenteditable="true">{{$task->task_name}}</td>
                <td class="pt-3-half" contenteditable="true">{{$task->description}}</td>
                <td class="pt-3-half" contenteditable="true">{{$task->customer_name}}</td>
                <td class="pt-3-half" contenteditable="true">{{$task->location}}</td>
                <td class="pt-3-half" contenteditable="true">{{$task->contact}}</td>
                <td class="pt-3-half" contenteditable="true">{{$task->email}}</td>
                <td class="pt-3-half" contenteditable="true">{{$task->asignee_name}}</td>
                <td class="pt-3-half">
                <span class="label label-warning">Not active</span>
                </td>
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