@extends('call-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
    <div  class="container-fluid alert alert-success" role="alert">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><p>Calls Details<a href=""><i class="fa fa-info-circle pull-right" style="font-size:13px"></i></a> </p></div>
                    
                </div>
            </div>
            <table class="table table-bordered ">
                <thead>
                    <tr class="bg-primary">
                        <th>Caller Name</th>
                        <th>Caller Email</th>
                        <th>Caller Tel.</th>
                        <th>Caller Location</th>
                        <th>Call Reason</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($calls as $call)
                    <tr>       
                    <td><b>{{$call->customer->customer_name}}</b></td>
                    <td><b>{{$call->email}}</b></td>
                    <td><b>{{$call->contact}}</b></td>
                    <td><b>{{$call->location}}</b></td>
                     <td><b>{{$call->reason}}</b></td>
                     <td><b>{{$call->created_at}}</b></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                
              </div>
        </div>
    </div> 
     
</body>
</section>
@endsection