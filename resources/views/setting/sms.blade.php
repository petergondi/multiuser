@extends('setting.base')
@section('action-content')
@include('partials.messages')
<div id="signupbox" style=" margin-top:30px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title fa fa-envelope">SMS Settings</div>
        </div> 
        {!! Form::open(['action' => 'SmsController@smsform','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }} 
        <div class="panel-body" >
            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label for="username" style="color:black;" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('sender_id') ? ' has-error' : '' }}">
                <label for="sender_id"  style="color:black;" class="col-md-4 control-label">Sender-ID</label>

                <div class="col-md-6">
                    <input id="sender_id" type="text" class="form-control" name="sender_id" value="{{ old('sender_id') }}" required>

                    @if ($errors->has('sender_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sender_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="api"  style="color:black;" class="col-md-4 control-label">API Key</label>

                <div class="col-md-6">
                    <input id="api" type="text" class="form-control" name="api" value="{{ old('api') }}" required>

                    @if ($errors->has('api'))
                        <span class="help-block">
                            <strong>{{ $errors->first('api') }}</strong>
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
    </div>
</div> 
</div>






</div>            

  
@endsection