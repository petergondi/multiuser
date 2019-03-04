@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
       <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                <span> <button class="btn btn-success btn-xs  " data-title="convert-task" data-toggle="modal" data-target="#exampleModalCenter" data-target="#convert-task" ><span class="fa fa-exchange"></span></button>
                    </span>
              </td>

              </tr>
              @endforeach
             
            
           
            </table>
          </div>
        </div>
      </div>
      @endsection