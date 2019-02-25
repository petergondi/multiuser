
@extends('user-management.base')
@section('action-content')
@include('partials.messages')
<div class="container-fluid alert alert-success" role="alert">
    <div class="row">
     <section class="content-header text-left">
    <p> <i class="fa fa-arrow-right"></i>This page shows you an overview of your created expense accounts. The top bar shows the amount that is available to be budgeted. 
    .<a href=""><i class="fa fa-info-circle" style="font-size:13px"></i></a></p>
    </section>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Add new User</div>
                <div class="panel-body ">  
                        {!! Form::open(['action' => 'UserController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label style="color:black;" for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                            <label style="color:black;" for="middlename" class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" required>

                                @if ($errors->has('middlename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label style="color:black;" for="address" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label style="color:black;" for="lastname" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

                        <div class="form-group">
                                <label style="color:black;" class="col-md-4 control-label">Assign Role</label>
                                <div class="col-md-6">
                                    <select class="selectpicker" name="role[]" multiple data-live-search="true">
                                    <div class="invisible">{{$roles = App\Roles::all()}}</div>
                                    @foreach ($roles as $role) 
                                         <option>{{$role->name}}</option>
                                 @endforeach
                                      </select>
                                   
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
