@extends('expenditure-management.base')
@section('action-content')
  @include('partials.messages')
  <meta name="csrf-token" content="{{ csrf_token() }}">
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid alert alert-success" role="alert">
    <div class="row">
    <section class="content-header text-center">
    <a href="#" class="previous round">&#8249;</a>
    <p>This page shows you an overview of your created expense accounts. The top bar shows the amount that is available to be budgeted. 
    .<a href=""><i class="fa fa-info-circle" style="font-size:13px"></i></a></p>
    </section>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
              <div style="width: auto !important;" class="panel-heading">
                <div class="row">
                  <div  class="col col-xs-6">
                    <h3 class="panel-title">My Expenses Requests</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table  class="table table-striped table-bordered table-list ">
                  <thead>
                    <tr>
                        <th>User</th>
                        <th>Expense</th>
                        <th>Purpose</th>
                        <th>Amount(Ksh.)</th>
                         <th>Date</th>
                         <th>View</td>
                          <th>Status</th>
                    </tr> 
                  </thead>
                  <tbody>
                  @foreach($myrequests as $myrequest)
                        <tr>
                            <td>{{$myrequest->user}}</td>
                            <td>{{$myrequest->expense}}</td>
                            <td>{{$myrequest->purpose}}</td>
                             <td>{{$myrequest->amount}}</td>
                            <td>{{$myrequest->created_at}}</td>
                            <td> <a href="" style="float:left;" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-primary btn-sm pull-right " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button></a></td>
                            @if($myrequest->status==0)
                            <td> <button type="submit" id="{{$myrequest->id}}" class="btn btn-sm btn-default">Pending..</button></td>
                            @elseif($myrequest->status==1)
                             <td> <button type="submit" id="{{$myrequest->id}}" class="btn btn-sm btn-success">Approved</button></td>
                             @else
                              <td><button type="submit" id="{{$myrequest->id}}" class="btn btn-sm btn-danger">Declined</button></td> 
                            @endif
                            @endforeach
                        </tbody>
                </table>
              </div>
              <div class="panel-footer">
                    <ul class="pagination hidden-xs pull-right">
                       {{$myrequests->links()}}
                    </ul>
                    <a href="javascript:history.back()" class="btn btn-default">Back</a>
                </div>
              </div>
            </div>
</div>
</div>
</div>
    @endsection