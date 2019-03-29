@extends('task-management.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.messages')

<section class="content">
<div class="card">
<p class="card-header text-center font-weight-bold text-uppercase py-4">Quotations<span class="badge"></span></p>
<p>New Quotations Requests &nbsp;<span class="glyphicon glyphicon-envelope"><span class="badge bg-warning">{{$usernew_quotations}}</span></span></p>
<p>New Invoice Requests &nbsp;<span class="glyphicon glyphicon-envelope"><span class="badge bg-warning">{{$usernew_invoice}}</span></span></p>
        <div class="card-body">
          <div id="table">
            <table class="table table-bordered table-responsive-md table-striped table-hover">
              <tr>
                 <th class=" bg-primary">No.</th>
                  <th class=" bg-primary">Category</th>
                  <th class=" bg-primary">Customer Name</th>
                 <th class=" bg-primary">Name</th>
                <th class=" bg-primary">Description</th>
                <th class=" bg-primary">Location</th>
                <th class=" bg-primary">Contact</th>
                <th class=" bg-primary">Customer Email</th>
                <th class=" bg-primary">Date</th>
                <th class=" bg-primary">Status</th>
                 <th class=" bg-primary">Check</th>

              </tr>
              @foreach($quotations as $quotation)
              @if($quotation->reason=="invoice")
                    <tr>
                    <td class="pt-3-half">{{$quotation->id}}</td>
                     <td class="pt-3-half">{{$quotation->reason}}</td>
                    <td class="pt-3-half"> {{$quotation->customer->customer_name}}</td>
                    <td class="pt-3-half"> {{$quotation->task_name}}</td>
                    <td class="pt-3-half"> {{$quotation->description}}</td>
                    <td class="pt-3-half" >{{$quotation->location}}</td>
                    <td class="pt-3-half" >{{$quotation->contact}}</td>
                    <td class="pt-3-half"> {{$quotation->email}}</td>
                    <td class="pt-3-half" >{{$quotation->created_at}}</td>

                
                    @if($quotation->response==0)
                    <td class="pt-3-half" ><button type="button" class="btn btn-secondary btn-sm">pending...</button></td>
                    @else
                    <td class="pt-3-half" ><button type="button" class="btn btn-primary btn-sm">sent</button></td>
                    @endif
                    <td class="pt-3-half" ><a href="/users/quotation/view/{{$quotation->id}}"><i class="fa fa-send-o"></i></a></td>
                    </tr>

                @elseif($quotation->reason=="quotation")
   
                <tr>
                <td class="pt-3-half">{{$quotation->id}}</td>
                 <td class="pt-3-half">{{$quotation->reason}}</td>
                <td class="pt-3-half"> {{$quotation->customer->customer_name}}</td>
                <td class="pt-3-half"> {{$quotation->task_name}}</td>
                <td class="pt-3-half"> {{$quotation->description}}</td>
                <td class="pt-3-half" >{{$quotation->location}}</td>
                <td class="pt-3-half" >{{$quotation->contact}}</td>
                <td class="pt-3-half"> {{$quotation->email}}</td>
                <td class="pt-3-half" >{{$quotation->created_at}}</td>

             
                @if($quotation->response==0)
                <td class="pt-3-half" ><button type="button" class="btn btn-secondary btn-sm">pending...</button></td>
                @else
                <td class="pt-3-half" ><button type="button" class="btn btn-primary btn-sm">sent</button></td>
                @endif
                <td class="pt-3-half" ><a href="/users/quotation/view/{{$quotation->id}}"><i class="fa fa-send-o"></i></a></td>
                </tr>
               
                  @else

                  @endif 
              @endforeach
            </table>
            <a href="javascript:history.back()" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
      @endsection