@extends('activities.base')
@section('action-content')
@include('partials.messages')
<style>
.toggle-header{
    padding:10px 0;
    margin:10px 0;
    background-color:black;
    color:white;
}
.txt-green{
    color:green;
}
.txt-red{
    color:red;
}
.radio,
.checkbox {
  margin-top: 0px;
  margin-bottom: 0px;
  }
</style>
<section class="container-fluid alert alert-success" role="alert">
<div class="container-fluid">
 <h1>Activities</h1>
	<div class="row">
	<div class="panel panel-default clearfix">
                            <div class="panel-heading">
                                <h2 class="panel-title">User Activities</h2>
                                <p class="small">
                                    This Section contain your Daily Routine, you can create activities and mark them on completetion                             
                                </p>
                            </div>
                            <div class="col-xs-12 toggle-header">
                                <div class="col-xs-6">
                                    <button type="button" class="btn btn-primary btn-sm hidden-xs" data-toggle="collapse" data-target="#feature-1">
                                        <i class="glyphicon glyphicon-resize-vertical"></i>Toggle Activities
                                    </button>
                                    <button type="button" class="btn btn-primary btn-xs visible-xs" data-toggle="collapse" data-target="#feature-1">
                                        <i class="glyphicon glyphicon-resize-vertical"></i>Toggle Set
                                    </button>
                                </div>
                                <div class="col-xs-2 text-center">
                                    <span class="hidden-xs">Comment</span>
                                    <span class="visible-xs">C</span>
                                </div>
                                <div class="col-xs-2 text-center">
                                     <span class="hidden-xs">In Progress</span>
                                    <span class="visible-xs">M</span>
                                </div>
                                <div class="col-xs-2 text-center">
                                     <span class="hidden-xs">Complete</span>
                                    <span class="visible-xs">L</span>
                                    <span class="hidden-xs">Save</span>
                                    <span class="visible-xs">S</span>
                                </div>
                            </div>
                            
                                <div id="feature-1" class="collapse in">
                                @foreach($user_activities as $user_activity)
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                   {{$user_activity->activity}}                                            
                                                </div>
                                                <div class="col-xs-2 text-center">
                                                   <textarea  name="is_company" placeholder="max 100 characters"></textarea>
                                                    <span class="checkround"></span>
                                                </div>
                                                <div class="col-xs-2 text-center">
                                               <input type="radio" name="is_company">
                                                    <span class="checkround"></span>
                                                </div>
                                                <div class="col-xs-2 text-center">
                                                  <input type="radio" name="is_company">
                                                    <span class="checkround"></span>
                                                    <button type="button" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i></button>
                                        </div> 
                                        
                                        </div>
                                        </div> 
                                     @endforeach  
                            </div>
	                </div>
                </div>
<button type="button" class="btn btn-sm btn-success pull-right"><i class="fa fa-file-archive-o"></i>Send Monthly Report</button>
</section>
@endsection