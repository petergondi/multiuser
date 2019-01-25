@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
       
<div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">My Assigned Tasks</h3>
            <div class="row">
                <div class="col-sm-4 pull-right">
                       
                </div>
            </div>
            <br/>
        <div class="card-body">
          <div id="table" class="table-editable">
            <table class="table table-bordered table-responsive-md table-striped table-hover">
              <tr>
            
                <th class=" bg-primary">Task Name</th>
                <th class=" bg-primary">Description</th>
                <th class=" bg-primary">Location</th>
                <th class=" bg-primary">Contact</th>
                <th class=" bg-primary">Customer Email</th>
                <th class=" bg-primary">Status</th>
                <th class=" bg-primary">reply</th>
                @foreach($usertasks as $usertask)
              </tr>
                <td class="pt-3-half" contenteditable="true"> {{$usertask->task_name}}</td>
              <td class="pt-3-half" contenteditable="true"> {{$usertask->description}}</td>
              <td class="pt-3-half" contenteditable="true"> {{$usertask->location}}</td>
              <td class="pt-3-half" contenteditable="true"> {{$usertask->contact}}</td>
              <td class="pt-3-half" contenteditable="true"> {{$usertask->email}}</td>
              @if($usertask->status=="yes")
              <td class="pt-3-half">
                <span class="label label-primary">Replied</span>
              </td>
              @else
              <td class="pt-3-half">
                <span class="label label-warning">Not Replied</span>
              </td>
              @endif
                <td class="pt-3-half"> <a href="/users/tasks/reply/{{$usertask->id}}">
                  <button type="button" class="btn btn-info add-new "><i class="fa fa-reply"></i></button>
                      </a></td>
               
              </tr>
              @endforeach
             
            
           
            </table>
          </div>
        </div>
      </div>
      @endsection