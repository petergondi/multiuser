@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
	<div class="row">
        <p>You are replying to The following assigned task</p>
        @foreach($taskassigned as $taskassign) 
        {{$taskid=$taskassign->id}}
            <ul  class="list-group">
            <li class="list-group-item">Task Name <strong>{{$taskassign->task_name}}</a></strong>
                    </li>
                </ul>
                <ul  class="list-group">
                        <li class="list-group-item">Task Description <strong>{{$taskassign->description}}</a></strong>
                        </li>
                    </ul>
                @endforeach  
                {!! Form::open(['action' => ['ReplyController@replyTask',$taskid,$userid],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
<div class="form-horizontal">
   
    <fieldset>

<!-- Form Name -->
<legend>Reply to the Assigned task</legend>

<!-- Textarea -->
<div class="form-group">
  <div class="col-md-12">   
                     
    <textarea class="form-control" id="textarea" name="reply" cols="30" rows="5" placeholder="reply to the task"></textarea>
   
</div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-info">reply</button>
  </div>
</div>

</fieldset>
</div>
{!! Form::close() !!}

	</div>
</div>
@endsection