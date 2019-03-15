@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">  
<div class="container-fluid">
<p id="project" class="card-header text-center font-weight-bold text-uppercase py-4"></p>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <div class="panel panel-default ">
    <div class="panel-body"><p id="start"></p><p id="end"></p>
    Description
    <p id="description"></p>
    </div>
  </div>  
      </div>
      <div class="modal-footer">
      <p class="pull-left" id="days"></p>
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
               
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
                <td class="pt-2-half" >{{$project->customers->customer_name}}</td>
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
                   <button class="btn btn-info btn-xs pull-right show" data-id="{{$project->id}}" title="view" data-toggle="modal" data-target="#exampleModal" data-target="#view" ><span class="fa fa-eye"></span></button>
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
      <script>
       $('.show').on('click', function(e) {
         var id = $(this).data("id");
       $.ajax({
           type : 'get',
        url : '{{URL::to('admin/project/view')}}',
        data:{'id':id,_token: '{!! csrf_token() !!}'},
        success:function(data){ 
              var project=data.project;
              var description=data.description;
              var customer=data.customer;
              var location=data.location;
              var email=data.email;
              var start=data.start;
               var end=data.end;
                var days=data.days;
              $("#exampleModalLabel").text(project);
              $("#description").text(description);
              $("#location").text(location);
              $("#start").text("Start Date:"+start);
              $("#end").text("End Date:"+end);
              $("#days").text("Days:"+days);
             
            }
           
             
       });
   });
      </script>
      @endsection
