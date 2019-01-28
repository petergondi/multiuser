@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
	<div class="row">
        <h4>You are replying to The following assigned task</h4>
     
      @foreach($tasks_to_comment as $task_to_comment)
  <div class="invisible">{{$taskid=$task_to_comment->id}}{{$userid=1}}</div>
            <ul  class="list-group">
            <li class="list-group-item bg-info"><strong>TASK NAME:{{$task_to_comment->task_name}}</strong> 
                   </li>
            </ul>
            <ul  class="list-group">
            <li class="list-group-item bg-info"><strong>TASK DESCRIPTION:{{$task_to_comment->description}}</strong> 
                    </li>
            </ul>
            @endforeach
            @foreach($comments as $comment)
            <ul  class="list-group">
            <li  class="list-group-item bg-info"><strong>Comment:</strong><i style="color:black" >&nbsp;{{$comment->reply}}&nbsp;
           
            </i><small style="color:black" class="pull-right">by:</small> 
                    </li>
                   
            </ul>
            @endforeach
            {!! Form::open(['action' => ['CommentController@CommentTask',$taskid,$userid],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
<div class="form-horizontal">
   
    <fieldset>
<!-- Form Name -->
<legend>Comment to the Assigned task</legend>
<!-- Textarea -->
<div class="form-group">
  <div class="col-md-12">                   
    <textarea class="form-control" id="textarea" name="comment" cols="30" rows="5" placeholder="reply to the task"></textarea>
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