@extends('dept-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Department</div>
                <div class="panel-body">
                    @if(!isset($dept->id))
                    {!! Form::open(['action' => 'DepartmentController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['action' => ['DepartmentController@update',$dept->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            @endif
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Department Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ $dept->number }}" required autofocus>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $dept->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Department Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $dept->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Incharge</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $dept->firstname }}" required>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
