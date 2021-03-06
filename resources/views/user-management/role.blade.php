@extends('user-management.base')
@section('action-content')
@include('partials.messages')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<div  class="container-fluid alert alert-success" role="alert">
    <div class="row">
          <div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-body">On this page you can see your budgets. The top bar is the amount that you can budget. You can adjust that yourself by clicking on the amount. What you have actually spent is shown in the bar below. 
    Below that you will see every budget and what you have budgeted for it.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
  </div>
</div>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading " style="background-color:#072F5F;color:white;">Create Role</div>
                <div class="panel-body ">  
                        {!! Form::open(['action' => 'RoleController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Role Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                        Create
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        {!! Form::close() !!}
                </div>
                <div class="panel-heading " style="background-color:#072F5F;color:white;">Edit User Roles</div>
                <table class="table table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Role Name</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($roles as $role)
                            <tr>       
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->created_at}}</td>
                                  <td>
                                    <a style="float:left;" href="/admin/user/role/edit/{{$role->id}}" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs " data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>&nbsp;&nbsp; </a>
                                    {!! Form::open(['action' => ['RoleController@destroy',$role->id],'method'=>'DELETE']) !!}
                                    <p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    {!! Form::close() !!}
                              </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
