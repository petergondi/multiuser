@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<style>
.table th {
    text-align: center;
}

.table {
    border-radius: 5px;
    width: 50%;
    float: none;
}
}
</style>
<section class="content">  
<div style="width:auto;" class="container alert alert-success" role="alert" >
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
           <table  id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%" align="center">
  <thead>
    <tr>
               <th class="th-sm">Category</th>
                <th class="th-sm">Task</th>
                 <th class="th-sm">customer name</th>
                <th class="th-sm">Description</th>
                <th class="th-sm">Date</th>
                <th class="th-sm">Location</th>
                <th class="th-sm">Contact</th>
                <th class="th-sm">Customer Email</th>
                <th class="th-sm">Assignee</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Project</th>
                <th class="th-sm">Comment</th>
                <th class="th-sm">View</th>
                <th class="th-sm">Edit</th>
                <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody>
     @foreach($tasks as $task)
              <tr>
              @if($task->response==1)
                <td>{{$task->reason}}<br/>
                <button type="button" title="email sent" class="btn btn-primary btn-xs"><i class="fa fa-paper-plane"></i></button></td>
                @else
                <td>{{$task->reason}}</td>
                @endif
                <td>{{$task->task_name}}</td>
                 <td >{{$task->customer_name}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->created_at->format('d/m/Y')}}</td>
                <td>{{$task->location}}</td>
                <td>{{$task->contact}}</td>
                <td>{{$task->email}}</td>
                @if($task->user->firstname==null)
                  <td></td>
                @else
                <td>{{$task->user->firstname}}</td>
                 @endif
                    <td>
                    @if($task->status=="yes")
                  <span class="label label-primary">Replied</span>
                  @else
                    <span class="label label-warning">Not Replied</span>
                    @endif
                    </td>
                    @if(App\Project::where('taskid',$task->id)->first())
                      <td><span class="label label-info">Yes</span></td>
                         <td>
                    @else
                      <td><span class="label label-dark">No</span></td>
                         <td  class="pt-2-half">
                    @endif
                    <a href="/admin/tasks/comment/{{$taskasignned=$task->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="reply"><button class="btn btn-success btn-xs pull-right " data-title="reply" data-toggle="modal" data-target="#reply" ><span class="fa fa-reply"></span></button></a>
                    </td>
                          <td  class="pt-2-half">
                    <a href="/admin/tasks/show/{{$show_task=$task->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-info btn-xs pull-right " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button></a>
                    </td>
                <td>
                <a href="/admin/tasks/edit/{{$task->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs pull-right " data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a>
                  {!! Form::open(['action' => ['TaskController@destroy',$task->id],'method'=>'DELETE']) !!}
                  </td>
                <td><p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs pull-right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                {!! Form::close() !!}</td>
              </tr>
              @endforeach
  </tbody>
  <tfoot>
     <th class="th-sm">Task</th>
                <th class="th-sm">Description</th>
                <th class="th-sm">Customer</th>
                <th class="th-sm">Date</th>
                <th class="th-sm">Location</th>
                <th class="th-sm">Contact</th>
                <th class="th-sm">Customer Email</th>
                <th class="th-sm">Assignee</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Project</th>
                <th class="th-sm">Comment</th>
                <th class="th-sm">View</th>
                <th class="th-sm">Edit</th>
                <th class="th-sm">Delete</th>
  </tfoot>
</table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $tasks->links() }}
            </div>
           <a href="javascript:history.back()" class="btn btn-primary">Back</a>
      </div>
      </section>
    
      @endsection