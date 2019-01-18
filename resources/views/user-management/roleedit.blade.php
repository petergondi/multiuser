@extends('user-management.base')
@section('action-content')
@include('partials.messages')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading " style="background-color:#072F5F;color:white;">Update Role</div>
                <div class="panel-body ">  
                        @if(!isset($role->id))
                        {!! Form::open(['action' => 'RoleController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                @else
                {!! Form::open(['action' => ['RoleController@update',$role->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                @endif
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Role Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
