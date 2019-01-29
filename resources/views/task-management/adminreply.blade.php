@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
	<div class="row">
        <h4>You are replying to The following assigned task</h4>
     
      @foreach($tasks_to_comment as $task_to_comment)
  <div class="invisible">{{$taskid=$task_to_comment->id}}{{$userid=1}}</div>
            <h3 style="text-center">Task Name:{{$task_to_comment->task_name}}</h3> 
             <h4 style="float-center">Task Description:{{$task_to_comment->description}}</h4> 
             <br>
             @endforeach
             <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
               Comments <span class="caret"></span>
              </a>
              <br/>
            <div class="collapse" id="collapseExample">
                <br/>
                @if($comments->count()==0)
               <p>No comments posted on this task</p>
               @else
            @foreach($comments as $comment)
              @if($comment->user_id==1)
              <div class="container1">
                <span  class="time-left"><strong>Admin</strong></span>
                <img src="https://cdn4.iconfinder.com/data/icons/people-std-pack/512/boss-512.png" alt="Avatar" style="width:100%;">
              <p>{{$comment->reply}}</p>
                <span class="time-left">{{$comment->created_at}}</span>
              </div>
              <hr>
              @else
              <div class="container darker">
              <span  class="time-left"><strong>{{$comment->user->firstname}}</strong></span>
                <img src=" https://cdn3.vectorstock.com/i/1000x1000/30/97/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg" alt="Avatar" class="right" style="width:100%;">
                <p>{{$comment->reply}}</p>
                <span class="time-left">{{$comment->created_at}}</span>
              </div>
              <hr>
              @endif
            @endforeach
            @endif
            </div>
            <br/>
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