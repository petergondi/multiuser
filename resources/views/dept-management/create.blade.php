@extends('dept-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Add new Department</div>
                <div class="panel-body">
                       
                        {!! Form::open(['action' => 'DepartmentController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Department number</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}" required autofocus>

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
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Department Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Incharge</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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
