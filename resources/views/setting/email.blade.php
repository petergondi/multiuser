@extends('setting.base')
@section('action-content')
@include('partials.messages')
<div class="container">    
            
    <div id="signupbox" style=" margin-top:30px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title fa fa-envelope">Mail Settings</div>
            </div>  
            {!! Form::open(['action' => 'MailController@emailform','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}
            <div class="panel-body" >
                <div class="form-group{{ $errors->has('host') ? ' has-error' : '' }}">
                    <label for="host" style="color:black;" class="col-md-4 control-label">Host</label>

                    <div class="col-md-6">
                        <input id="host" type="text" class="form-control" name="host" value="{{ old('host') }}" required autofocus>

                        @if ($errors->has('host'))
                            <span class="help-block">
                                <strong>{{ $errors->first('host') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('from_email') ? ' has-error' : '' }}">
                    <label for="from"  style="color:black;" class="col-md-4 control-label">From Email</label>

                    <div class="col-md-6">
                        <input id="from_email" type="text" class="form-control" name="from_email" value="{{ old('from_email') }}" required>

                        @if ($errors->has('from_email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('from_email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('from_name') ? ' has-error' : '' }}">
                    <label for="address"  style="color:black;" class="col-md-4 control-label">From Name</label>

                    <div class="col-md-6">
                        <input id="from_name" type="text" class="form-control" name="from_name" value="{{ old('from_name') }}" required>

                        @if ($errors->has('from_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('from_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="address"  style="color:black;" class="col-md-4 control-label">Username</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="lastname"  style="color:black;" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <a href="javascript:history.back()" class="btn btn-default">Back</a>
        </div>
    </div> 
</div>
    





</div>            
  
@endsection