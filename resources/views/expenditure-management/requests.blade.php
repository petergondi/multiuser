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
                    <h3 class="panel-title">Users Expenses Requests</h3>
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
                        <th>Approve/Decline</th>
                    </tr> 
                  </thead>
                  <tbody>
                  @foreach($sent_requests as $sent_request)
                        <tr>
                            <td>{{$sent_request->user}}</td>
                            <td>{{$sent_request->expense}}</td>
                            <td>{{$sent_request->purpose}}</td>
                             <td>{{$sent_request->amount}}</td>
                            <td>{{$sent_request->created_at}}</td>
                            <td> <a href="" style="float:left;" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-primary btn-xs pull-right " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button></a></td>
                            @if($sent_request->status==0)
                            <td> <button type="submit" id="{{$sent_request->id}}" class="btn btn-sm btn-default">Pending..</button></td>
                            @elseif($sent_request->status==1)
                             <td> <button type="submit" id="{{$sent_request->id}}" class="btn btn-sm btn-success">Approved</button></td>
                             @else
                              <td><button type="submit" id="{{$sent_request->id}}" class="btn btn-sm btn-danger">Declined</button></td> 
                            @endif
                            <td>
                            <button type="submit" data-id="{{$sent_request->id}}" class="btn btn-sm btn-success approve"><span class="fa fa-check"></span></button>
                            <button type="submit" data-id="{{$sent_request->id}}" class="btn btn-sm btn-danger decline"><span class="glyphicon glyphicon-remove"></span></button>
                            </td> 
                            @endforeach
                        </tbody>
                </table>
              </div>
              <div class="panel-footer">
                    <ul class="pagination hidden-xs pull-right">
                       {{$sent_requests->links()}}
                    </ul>
                </div>
              </div>
            </div>
</div></div></div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
 $('.approve').on('click', function(e) {
    e.preventDefault();
       var id = $(this).data("id");
       $.ajax({
           type: "POST",
           url:"/admin/request/approval/"+id,
           data: {id:id,_token: '{!! csrf_token() !!}'},
           success:function(data){
            //alert(data);
         $("#"+id).text("Declined").removeClass("btn btn-sm btn-default");
        $("#"+id).text("Declined").removeClass("btn btn-sm btn-danger");
          $("#"+id).text("Approved").addClass("btn btn-sm btn-success");
        }
       });
   });
   $('.decline').on('click', function(e) {
    e.preventDefault();
       var id = $(this).data("id");
       $.ajax({
           type: "POST",
           url:"/admin/request/decline/"+id,
           data: {id:id,_token: '{!! csrf_token() !!}'},
           success:function(data){
             $("#"+id).text("Declined").removeClass("btn btn-sm btn-default");
              $("#"+id).text("Declined").removeClass("btn btn-sm btn-success");
               $("#"+id).text("Declined").addClass("btn btn-sm btn-danger");
        }
       });
   });
</script>
    @endsection