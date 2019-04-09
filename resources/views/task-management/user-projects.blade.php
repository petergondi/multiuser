@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">  
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
                  <th class=" bg-primary">Progress</th>
                <th class=" bg-primary">Reply</th>
                <th class=" bg-primary">View</th>
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
                  @if($project->progress==0)
                   <td class="pt-2-half"><button class="btn btn-sm bg-primary">in progress..</button>
                   </td>
                   @else
                   <td class="pt-2-half"><button class="btn btn-sm bg-success">complete</button>
                   </td>
                  @endif
               <td class="pt-2-half" >
                    <a href="/users/tasks/reply/{{$taskasignned=$project->taskid}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="reply"><button class="btn btn-success btn-sm pull-right " data-title="reply" data-toggle="modal" data-target="#reply" ><span class="fa fa-reply"></span></button></a>
                    </td>
                          <td  class="pt-2-half">
                   <button class="btn btn-info btn-sm pull-right show" data-id="{{$project->id}}" title="view" data-toggle="modal" data-target="#exampleModal" data-target="#view" ><span class="fa fa-eye"></span></button>
                    </td>
              </tr>
              @endforeach
           
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
             
            </div>
          </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-default">Back</a>
      </div>
      
      @endsection
