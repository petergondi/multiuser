@extends('task-management.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.messages')

<section class="content">
       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Convert This Task To project</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert alert-success" role="alert">
        <div class="panel panel-default alert alert-success" role="alert">
    <div class="panel-body" ><a href="info"><i class="fa fa-info-circle " style="font-size:15px"></i></a><h4 id="task"></h4><p id="description"></p></div>
  </div>
  <div class="bg-primary" id="posted"></div>
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">From:</label>
            <input type="text" class="form-control" id="from" placeholder="yy/mm/dd" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">To:</label>
            <input type="text" class="form-control" id="to" placeholder="yy/mm/dd" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Note:</label>
            <textarea class="form-control" id="note" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submit" class="btn btn-success">Convert</button>
      </div>
    </div>
  </div>
</div>
<div class="card">
<p class="card-header text-center font-weight-bold text-uppercase py-4">Quotations<span class="badge"></span></p>
<p>New Quotations Requests &nbsp;<span class="glyphicon glyphicon-envelope"><span class="badge bg-warning">{{$usernew_quotations}}</span></span></p>
        <div class="card-body">
          <div id="table">
            <table class="table table-bordered table-responsive-md table-striped table-hover">
              <tr>
                 <th class=" bg-primary">No.</th>
                 <th class=" bg-primary">Name</th>
                <th class=" bg-primary">Description</th>
                <th class=" bg-primary">Location</th>
                <th class=" bg-primary">Contact</th>
                <th class=" bg-primary">Customer Email</th>
                <th class=" bg-primary">Date</th>
                 <th class=" bg-primary">Send</th>

              </tr>
              @foreach($quotations as $quotation)
              <tr>
              <td class="pt-3-half">{{$quotation->id}}</td>
               <td class="pt-3-half"> {{$quotation->task_name}}</td>
              <td class="pt-3-half"> {{$quotation->description}}</td>
              <td class="pt-3-half" >{{$quotation->location}}</td>
              <td class="pt-3-half" >{{$quotation->contact}}</td>
              <td class="pt-3-half"> {{$quotation->email}}</td>
              <td class="pt-3-half" >{{$quotation->created_at}}</td>
              <td class="pt-3-half" ><a href=""><i class="fa fa-send-o"></a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      @endsection