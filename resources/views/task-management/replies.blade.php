@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
	<div class="row">
        <h4>You are replying to The following assigned task</h4>
        @foreach($taskassigned as $taskassign) 
        <div class="invisible">{{$taskid=$taskassign->id}}</div>
        <h3 style="text-center">Task Name:{{$taskassign->task_name}}</h3> 
        <h4 style="float-center">Task Description:{{$taskassign->description}}</h4> 
                @endforeach  
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Comments <span class="badge">{{$comments->count()}}</span><span class="caret"></span>
                   </a>
                   <br/>
                   <div class="collapse" id="collapseExample">
                       <br/>
                       @if($comments->count()==0)
                      <p>No comments posted on this task</p>
                      @else
                      <message :messages="messages"></message>
                      <sent-message v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></sent-message>
                   @endif
                   </div>
                   <br/>
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
<a href="javascript:history.back()" class="btn btn-default">Back</a>

	</div>
</div>
@endsection