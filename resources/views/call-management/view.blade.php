@extends('call-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
    <div  class="container-fluid alert alert-success" role="alert">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><p>Customers Details<a href=""><i class="fa fa-info-circle pull-right" style="font-size:13px"></i></a> </p></div>
                    
                </div>
            </div>
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
                    <tr>       
                    <td><b>1</td>
                    <td><b>2</b></td>
                    <td><b>3</b></td>
                    <td><b>4</b></td>
                        <td>
                            <p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                
              </div>
        </div>
    </div> 
     
</body>
</section>
@endsection