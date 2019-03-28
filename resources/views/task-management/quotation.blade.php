@extends('task-management.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.messages')
 <style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>
<section class="container-fluid alert alert-success" role="alert">
<div class="card">
<p class="card-header text-center font-weight-bold text-uppercase py-3"><strong>{{$quotation->reason}}</strong><span class="badge"></span></p>
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
 <form method="POST" action="{{ route('users.file.upload',[$name=$quotation->customer->customer_name,$email=$quotation->email,$topic=$quotation->task_name,$id=$quotation->id]) }}" enctype="multipart/form-data">
                @csrf
    <div class="container-fluid">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
      <label for="fileToUpload"><cite>Upload<i class="fa fa-upload"></i></cite></label><br />
      <input type="file"  name="file" id="poster"/></i><br/>
      <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>
    </div>
    <div id="fileName"></div>
    <div id="fileSize"></div>
    <div id="fileType"></div>

    <div class="row">
       <button type="submit"  value="Submit" class="btn btn-success"><i class="fa fa-send-o"></i>Send</button>
    </div>
 </form>  
            </div>
        </div>
    </div>
  </div>
          </div>
        </div>
      </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
 
<script type="text/javascript">
 
    function validate(formData, jqForm, options) {
        var form = jqForm[0];
        if (!form.file.value) {
            alert('File not found');
            return false;
        }
    }
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('form').ajaxForm({
        beforeSubmit: validate,
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=file]');
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function() {
            var percentVal = 'Wait, Saving';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
            //alert('Uploaded Successfully');
            window.location.href = "/users/quotations/view";
        }
    });
     
    });
</script>  
      @endsection