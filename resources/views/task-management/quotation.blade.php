@extends('task-management.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.messages')

<section class="container-fluid alert alert-success" role="alert">
<div class="card">
<p class="card-header text-center font-weight-bold text-uppercase py-4">Quotations/Invoice<span class="badge"></span></p>
        <div class="card">
  <h5 class="card-header h4"><strong>{{$quotation->task_name}}</strong></h4>
  <div class="card-body">
    <h5 class="card-title"><strong>Client/Supplier Details</strong></h5>
    
  <ul>
    <li>Customer/Supplier:{{$quotation->customer->customer_name}}</li>
    <li>Email:{{$quotation->email}}</li>
    <li>Location:{{$quotation->location}}</li>
    <li>Contact:{{$quotation->contact}}</li>
  </ul>
  <div class="card-header">
  <h5 class="card-title"><strong>Description</strong></h5>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>{{$quotation->description}}</p>
      <footer class="blockquote-footer">client/supplier <cite title="Source Title"> {{$quotation->customer->customer_name}}</cite></footer>
    </blockquote>
  </div>
</div>
  </div>
</div>
             <div class="container-fluid">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
      <label for="fileToUpload"><cite>Upload<i class="fa fa-upload"></i></cite></label><br />
      <input type="file"  name="fileToUpload" id="fileToUpload" onchange="fileSelected();"/></i><br/>
      <div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    10% 
  </div>
</div>
    </div>
    <div id="fileName"></div>
    <div id="fileSize"></div>
    <div id="fileType"></div>

    <div class="row">
       <a href="#!" class="btn btn-success"><i class="fa fa-send-o"></i>Send</a>
    </div>
    

            </div>
        </div>
    </div>
  </div>
          </div>
        </div>
      </div>
      
      @endsection