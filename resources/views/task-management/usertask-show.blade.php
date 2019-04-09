@extends('task-management.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.messages')
 <style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>
<section class="container-fluid alert alert-success" role="alert">
<div class="card">
<p class="card-header text-center font-weight-bold text-uppercase py-3"><strong>{{$check_tasks->reason}}</strong><span class="badge"></span></p>
        <div class="card">
  <h5 class="card-header h4"><strong>{{$check_tasks->task_name}}</strong></h4>
  <div class="card-body">
    <h5 class="card-title"><strong>Task Details</strong></h5>
    
  <ul>
    <li>Category:{{$check_tasks->customer_name}}</li>
    <li>Task:{{$check_tasks->customer_name}}</li>
    <li>Email:{{$check_tasks->email}}</li>
    <li>Location:{{$check_tasks->location}}</li>
    <li>Contact:{{$check_tasks->contact}}</li>
    <li>Status:{{$check_tasks->contact}}</li>
    <li>Project:{{$check_tasks->contact}}</li>
  </ul>
  <div class="card-header">
  <h5 class="card-title"><strong>Description</strong></h5>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>{{$check_tasks->description}}</p>
      <footer class="blockquote-footer">client/supplier <cite title="Source Title"> {{$check_tasks->customer->customer_name}}</cite></footer>
    </blockquote>
  </div>
</div>
  </div>
</div>
 
            </div>
            <a href="javascript:history.back()" class="btn btn-default pull-right">Back</a>
        </div>
    </div>
  </div>
  
          </div>
        </div>
      </div>

      @endsection