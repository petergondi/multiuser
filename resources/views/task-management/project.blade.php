@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">  
<div class="container-fluid alert alert-success" role="alert">
<p class="card-header text-center font-weight-bold text-uppercase py-4">Projects </p>
               
            <br/>
        <div class="card-body">
          <div id="table">
            <table class="table table-bordered table-striped table-hover table-responsive">
              <tr>
            
                <th class=" bg-primary">Task</th>
                <th class=" bg-primary">Description</th>
                <th class=" bg-primary">Customer</th>
                <th class=" bg-primary">Date</th>
                <th class=" bg-primary">Location</th>
                <th class=" bg-primary">Contact</th>
                <th class=" bg-primary">Customer Email</th>
                 <th class="bg-primary">From</th>
                 <th class="bg-primary">To</th>
                <th class=" bg-primary">Days</th>
                <th class=" bg-primary">Reply</th>
                <th class=" bg-primary">View</th>
                <th class=" bg-primary">Terminate</th>
              </tr>
              @foreach($projects as $project)
              <tr>
                <td class="pt-2-half" >{{$project->task_name}}</td>
                <td class="pt-2-half" >{{$project->description}}</td>
                <td class="pt-2-half" >{{$project->customer_name}}</td>
                <td class="pt-2-half" >{{$project->created_at->format('d/m/Y')}}</td>
                <td class="pt-2-half" >{{$project->location}}</td>
                <td class="pt-2-half" >{{$project->contact}}</td>
                <td class="pt-2-half" >{{$project->email}}</td>
                <td class="pt-2-half" >{{$project->start}}</td>
                <td class="pt-2-half" >{{$project->end}}</td>
                  <td class="pt-2-half">{{$project->days}}</td>
               <td class="pt-2-half" >
                    <a href="/admin/tasks/comment/{{$taskasignned=$project->taskid}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="reply"><button class="btn btn-success btn-xs pull-right " data-title="reply" data-toggle="modal" data-target="#reply" ><span class="fa fa-reply"></span></button></a>
                    </td>
                          <td  class="pt-2-half">
                    <a href="" style="float:left;" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-info btn-xs pull-right " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button></a>
                    </td>
                <td class="pt-2-half"><p style="float:left;" data-placement="top" data-toggle="tooltip" title="terminate"><button class="btn btn-danger btn-xs pull-right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-remove"></span></button></p></td>
                {!! Form::close() !!}</td>
              </tr>
              @endforeach
           
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
             
            </div>
          </div>
        </div>
      </div>
      @endsection