@extends('task-management.base')
@section('action-content')
@include('partials.messages')

<div class="container-fluid alert alert-success" role="alert">

    <div class="row">
    <div class="panel panel-default">
    <div class="panel-body"><a href="info"><i class="fa fa-info-circle " style="font-size:15px"></i></a>On this page you can see your budgets. The top bar is the amount that you can budget. You can adjust that yourself by clicking on the amount. What you have actually spent is shown in the bar below. 
    Below that you will see every budget and what you have budgeted for it.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
  </div>
</div>
        <div class="col-md-8 col-md-offset-2 >
            <div class="panel panel-default">
                <div class="panel-heading bg-success ">Assign Task</div>
                {!! Form::open(['action' => 'TaskController@storeTask','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                            <label for="task_name" class="col-md-4 control-label">Task Name</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{ old('task_name') }}" required autofocus>

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
                                <textarea class="form-control" rows="5" name="description" id="comment"  value="{{ old('description') }}" required></textarea>
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
                                <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}" required>

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
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>

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
                                    <input id="contact" type="tel" class="form-control" name="contact" value="{{ old('contact') }}" required>
    
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
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
        
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
                                            <select class="form-control" name="asignee_id" id="assignee">
                                                    <option value="" selected>Select Assignee</option>
                                                    @foreach($assignees as $assignee)
                                            <option value="{{$assignee->id}}">{{$assignee->firstname}}</option>
                                                    @endforeach
                                                  </select>
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
                                    Assign
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