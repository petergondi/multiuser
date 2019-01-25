@extends('customers.base')
@section('action-content')
@include('partials.messages')
<section class="content">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customers <b>Details</b></h2></div>
                </div>
            </div>
            @if($customers->count()==0)
            <p>No Customer Data </p>
            @else
            <table class="table table-bordered ">
                <thead>
                    <tr class="bg-primary">
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Tel.</th>
                        <th>Customer Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($customers as $customer)
                    <tr>       
                    <td><b>{{$customer->customer_name}}</td>
                    <td><b>{{$customer->email}}</b></td>
                    <td><b>{{$customer->contact}}</b></td>
                    <td><b>{{$customer->location}}</b></td>
                        <td>
                            <p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            @endif
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                {{ $customers->links() }}
              </div>
        </div>
    </div>     
</body>
</section>
@endsection