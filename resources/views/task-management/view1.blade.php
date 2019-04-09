@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">  
<div class="container-fluid alert alert-success" role="alert" >
<p class="card-header text-center font-weight-bold text-uppercase py-4">Assigned Tasks &nbsp;<span class="badge bg-info">{{$totaltask=App\Task::All()->count()}}</span></p>
<p >Tasks Not replied To:  &nbsp;<span class="glyphicon glyphicon-envelope"><span class="badge bg-warning">{{$unreplied=App\Task::where('status','no')->count()}}</span></span></p> 
            <div class="row">
                <div class="col-sm-4 pull-right">
                        <a href="/admin/tasks/assign">
                    <button type="button" class="btn btn-success add-new "><i class="fa fa-plus"></i> Assign New Task</button>
                        </a>
                </div>
            </div>
            <br/>
     
         
            <table class="table table-bordered table-striped table-hover ">
              <tr>
                <th class=" bg-primary">Category</th>
                <th class=" bg-primary">Task</th>
                <th class=" bg-primary">Description</th>
                <th class=" bg-primary">Customer</th>
                <th class=" bg-primary">Date</th>
                <th class=" bg-primary">Location</th>
                <th class=" bg-primary">Contact</th>
                <th class=" bg-primary">Customer Email</th>
                <th class=" bg-primary">Assignee</th>
                <th class="bg-primary">Status</th>
                <th class=" bg-primary">Project</th>
                <th class=" bg-primary">Comment</th>
                <th class=" bg-primary">View</th>
                <th class=" bg-primary">Edit</th>
                <th class=" bg-primary">Delete</th>
              </tr>
              @foreach($tasks as $task)
              <tr>
              @if($task->response==1)
                <td class="pt-2-half" >{{$task->reason}}<br/>
                <button type="button" title="email sent" class="btn btn-primary btn-xs"><i class="fa fa-paper-plane"></i></button></td>
                @else
                <td class="pt-2-half" >{{$task->reason}}</td>
                @endif
                <td class="pt-2-half" >{{$task->task_name}}</td>
                <td class="pt-2-half" >{{$task->description}}</td>
                <td class="pt-2-half" >{{$task->customer->customer_name}}</td>
                <td class="pt-2-half" >{{$task->created_at->format('d/m/Y')}}</td>
                <td class="pt-2-half" >{{$task->location}}</td>
                <td class="pt-2-half" >{{$task->contact}}</td>
                <td class="pt-2-half" >{{$task->email}}</td>
                @if($task->user->firstname==null)
                  <td class="pt-2-half" ></td>
                @else
                <td class="pt-2-half" >{{$task->user->firstname}}</td>
                 @endif
                    <td class="pt-2-half" >
                    @if($task->status=="yes")
                  <span class="label label-primary">Replied</span>
                  @else
                    <span class="label label-warning">Not Replied</span>
                    @endif
                    </td>
                    @if(App\Project::where('taskid',$task->id)->first())
                      <td class="pt-2-half" ><span class="label label-info">Yes</span></td>
                         <td  class="pt-2-half">
                    @else
                      <td class="pt-2-half" ><span class="label label-dark">No</span></td>
                         <td  class="pt-2-half">
                    @endif
                    <a href="/admin/tasks/comment/{{$taskasignned=$task->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="reply"><button class="btn btn-success btn-xs pull-right " data-title="reply" data-toggle="modal" data-target="#reply" ><span class="fa fa-reply"></span></button></a>
                    </td>
                          <td  class="pt-2-half">
                    <a href="/admin/tasks/edit/{{$task->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-info btn-xs pull-right " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button></a>
                    </td>
                <td class="pt-2-half">
                <a href="/admin/tasks/edit/{{$task->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs pull-right " data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a>
                  {!! Form::open(['action' => ['TaskController@destroy',$task->id],'method'=>'DELETE']) !!}
                  </td>
                <td class="pt-2-half"><p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs pull-right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                {!! Form::close() !!}</td>
              </tr>
              @endforeach
           
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $tasks->links() }}
            </div>
           <a href="javascript:history.back()" class="btn btn-primary">Back</a>
      </div>
      </section>
      @endsection