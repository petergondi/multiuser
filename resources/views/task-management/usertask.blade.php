@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content">
       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Convert This Task To project</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert alert-success" role="alert">
        <div class="panel panel-default alert alert-success" role="alert">
    <div class="panel-body" ><a href="info"><i class="fa fa-info-circle " style="font-size:15px"></i></a><h4 id="task"></h4><p id="description"></p></div>
  </div>
  <div class="bg-primary" id="posted"></div>
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">From:</label>
            <input type="text" class="form-control" id="from" placeholder="yy/mm/dd" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">To:</label>
            <input type="text" class="form-control" id="to" placeholder="yy/mm/dd" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Note:</label>
            <textarea class="form-control" id="note" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submit" class="btn btn-success">Convert</button>
      </div>
    </div>
  </div>
</div>
<div class="card">
<p class="card-header text-center font-weight-bold text-uppercase py-4">My Assigned Tasks<span class="badge">{{$usertasks->count()}}</span></p>
<p>New Tasks &nbsp;<span class="glyphicon glyphicon-envelope"><span class="badge bg-warning">{{$usernew_task}}</span></span></p>
            <div class="row">
                <div class="col-sm-4 pull-right">
                       
                </div>
            </div>
            <br/>
        <div class="card-body">
          <div id="table">
            <table class="table table-bordered table-responsive-md table-striped table-hover">
              <tr>
                 <th class=" bg-primary">No.</th>
                <th class=" bg-primary">Task Name</th>
                <th class=" bg-primary">Description</th>
                <th class=" bg-primary">Location</th>
                <th class=" bg-primary">Contact</th>
                <th class=" bg-primary">Customer Email</th>
                <th class=" bg-primary">Status</th>
                 <th class=" bg-primary">Project</th>
                <th class=" bg-primary">reply</th>
                <th class=" bg-primary">comments</th>
                <th class=" bg-primary">View</th>
                 <th class=" bg-primary">Convert</th>
                @foreach($usertasks as $usertask)
              </tr>
              <td class="pt-3-half"> {{$usertask->id}}</td>
              <td class="pt-3-half"> {{$usertask->task_name}}</td>
              <td class="pt-3-half" > {{$usertask->description}}</td>
              <td class="pt-3-half" > {{$usertask->location}}</td>
              <td class="pt-3-half"> {{$usertask->contact}}</td>
              <td class="pt-3-half" > {{$usertask->email}}</td>
              @if($usertask->status=="yes")
              <td class="pt-3-half">
                <span class="label label-primary">Replied</span>
              </td>
              @else
              <td class="pt-3-half">
                <span class="label label-warning">Not Replied</span>
              </td>
              @endif
              @if(App\Project::where('taskid',$usertask->id)->first())
                      <td class="pt-2-half" ><span class="label label-info">Yes</span></td> 
                    @else
                      <td class="pt-2-half" ><span class="label label-dark">No</span></td>
                    @endif
                <td class="pt-3-half"> 
                     <a href="/users/tasks/reply/{{$usertask->id}}" style="float:left;" data-placement="top" data-toggle="tooltip" title="reply"><button class="btn btn-primary btn-xs pull-right " data-title="reply" data-toggle="modal" data-target="#reply" ><span class="fa fa-reply"></span></button></a>
                      </a></td>
                        <td class="pt-3-half">
                            <span class="label label-warning">{{$usertasks->count()}}</span>
                          </td>
                           <td  class="pt-3-half">
                    <a href="" style="float:left;" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-primary btn-xs pull-right " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button>&nbsp;&nbsp;</a>
                    </td>
                      <td class="pt-3-half">
                <span> <button class="btn btn-success btn-xs convert" id="convert" title="convert-task" data-id="{{$usertask->id}}" data-toggle="modal" data-target="#exampleModal" ><span class="fa fa-exchange"></span></button>
                    </span>
              </td>

              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
      <script>
      //displaying task details to be converted in the modal
      $('.convert').on('click', function(e) {
         var id = $(this).data("id");
       $.ajax({
           type : 'get',
        url : '{{URL::to('users/task/convert')}}',
        data:{'id':id},
        success:function(data){ 
            $('#submit').on('click', function(e) {
              var task=data.task;
              var description=data.description;
              var customer=data.customer;
              var location=data.location;
              var email=data.email;
              var contact=data.contact;
              var taskid=data.taskid;
              //var asignee_name=data.task;
              var from= $('#from').val();
              var to= $('#to').val();
              var note= $('#note').val();
              $.post("{{URL::to('users/project/create')}}",{taskid:taskid,task:task,description:description,customer:customer,location:location,email:email,contact:contact,from:from,to:to,note:note,_token: '{!! csrf_token() !!}'},
              function(data){  
                 $('#posted').text(data);
                  //$(".convert").attr("disabled", false);
               $('#from').val("");
               $('#to').val("");
               $('#note').val("");
              });
            });
            $('#task').text(data.task);
            $('#description').text(data.description);
            }    
       });
   });
       var options={
            format: 'mm-dd-yyyy',
            todayHighlight: true,
            autoclose: true,
          orientation: 'top auto'
        };

    $('#from').datepicker(options);
    $('#to').datepicker(options);
      
      </script>
      @endsection