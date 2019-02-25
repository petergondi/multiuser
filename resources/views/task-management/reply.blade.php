@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<div style="width:auto;border-color:black;" class="container alert alert-success" role="alert">
	<div class="row">
        <p>You are replying to The following assigned task</p>
        @foreach($taskassigned as $taskassign) 
        <div class="invisible">{{$taskid=$taskassign->id}}</div>
        <p style="text-center">Task Name:{{$taskassign->task_name}}</p> 
        <p style="float-center">Task Description:{{$taskassign->description}}</p> 
                @endforeach  
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Comments <span class="badge">{{$comments->count()}}</span><span class="caret"></span>
                   </a>
                   <br/>
                  
                   <div  class="collapse" id="collapseExample">
                       <br/>
                       @if($comments->count()==0)
                      <p>No comments posted on this task</p>
                      @else
                   @foreach($comments as $comment)
                     @if($comment->user_id==0)
                     <div  style="width:auto;" class="container1">
                       <span  class="time-left"><strong>Admin</strong></span>
                       <img src="https://cdn4.iconfinder.com/data/icons/people-std-pack/512/boss-512.png" alt="Avatar" style="width:100%;">
                     <p>{{$comment->reply}}</p>
                       <span class="time-left">{{$comment->created_at}}</span>
                     </div>
                     <hr>
                     @else
                     <div style="width:auto;" class="container darker">
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
                {!! Form::open(['action' => ['ReplyController@replyTask',$taskid,$userid],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
<div class="form-horizontal">
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'textarea' );
</script>
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
    <button id="singlebutton" name="singlebutton" class="btn btn-success pull-right">reply</button>
  </div>
</div>

</fieldset>
</div>
{!! Form::close() !!}

	</div>
</div>
@endsection