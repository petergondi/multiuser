@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Edit Task</div>
                @if(!isset($task->id))
                {!! Form::open(['action' => 'TaskController@storeTask','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['action' => ['TaskController@update',$task->id,$task->customer_name],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @endif
       
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                            <label for="task_name" class="col-md-4 control-label">Task Name</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{$task->task_name}}" required autofocus>

                                @if ($errors->has('task_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Task Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{$task->description }}" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                            <label for="customer_name" class="col-md-4 control-label">Customer Name</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{$task->customer_name}}" required>

                                @if ($errors->has('customer_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{$task->location}}" required>

                                @if ($errors->has('Location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                <label for="contact" class="col-md-4 control-label">Customer Contact</label>
    
                                <div class="col-md-6">
                                    <input id="contact" type="tel" class="form-control" name="contact" value="{{$task->contact}}" required>
    
                                    @if ($errors->has('contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Customer email</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="email" value="{{$task->email}}" required>
        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('asignee_name') ? ' has-error' : '' }}">
                                        <label for="asignee_name" class="col-md-4 control-label">Assignee</label>
            
                                        <div class="col-md-6">
                                            <input id="asignee_name" type="text" class="form-control" name="asignee_name" value="{{ $task->asignee_name}}" required>
            
                                            @if ($errors->has('asignee_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('asignee_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Update
                                </button>
                            </div>
                        </div>
                        
                        </div>
                        </div>
                        </div>
                        
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection