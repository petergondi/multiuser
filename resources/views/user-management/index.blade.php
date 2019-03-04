@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header text-left">
      <h4><i class="fa fa-home"></i>
        Signed In levels
      </h4>
<div class="container-fluid alert alert-success" role="alert">
 <div class="panel-body"><a href="info"><i class="fa fa-info-circle " style="font-size:15px"></i></a> On this page you can log in as more than one user level and perform the dedicated roles assigned to each user level. 
 The sidebar will show you all the available operations you can perform once logged in as one of the user levels. 
   .</div>
  </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Signed As:</div>
                    <div class="panel-body">
@component('component.who')
@endcomponent
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection