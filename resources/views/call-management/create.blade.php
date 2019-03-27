@extends('call-management.base')
@section('action-content')
@include('partials.messages')

<div class="container-fluid alert alert-success" role="alert">

    <div class="row">
    <div class="panel panel-default">
    <div class="panel-body"><a href="info"><i class="fa fa-info-circle " style="font-size:15px"></i></a>On this page you can see your budgets. The top bar is the amount that you can budget. You can adjust that yourself by clicking on the amount. What you have actually spent is shown in the bar below. 
    Below that you will see every budget and what you have budgeted for it.</div>
  </div>
</div>
        <div class="col-md-8 col-md-offset-2 >
            <div class="panel panel-default">
                <div class="panel-heading bg-success ">Record Call Details</div>
                {!! Form::open(['action' => 'TaskController@storeTask','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
                <div class="panel-body">
                 <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                                        <label for="customer_name" class="col-md-4 control-label">Customer<button data-toggle="modal" data-target="#exampleModal" title="add new person" class="btn btn-sm"><i class="fa fa-plus"></i></button></label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="customer_name" id="customer_name">
                                                    <option value="" selected>Select Customer</option>    
                                            <option value=""></option>   
                                                  </select>
                                            @if ($errors->has('customer_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('customer_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                       
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Call Purpose</label>
                            <div class="col-md-6">
                               <label class="radio-inline">
                            <input type="radio" name="optradio" checked>Meeting
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="optradio">Task
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="optradio">Quotation
                            </label>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Header</label>

                            <div class="col-md-6">
                                <input id="header" type="text" class="form-control" name="name" value="{{ old('header') }}" required>

                                @if ($errors->has('header'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('header') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Call Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="description" id="comment"  value="{{ old('description') }}" required></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       
                                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Submit
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