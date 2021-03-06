@extends('dept-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
       
        <div class="container-fluid alert alert-success" role="alert">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><p>Department <b>Details</b></p></div>
                    <div class="col-sm-4">
                            <a href="/admin/dept/create">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New Department</button>
                            </a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered ">
                <thead>
                    <tr class="bg-primary">
                        <th>Department Code</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Incharge</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($depts as $dept)
                    <tr>       
                    <td><b>{{$dept->number}}</td>
                    <td><b>{{$dept->name}}</b></td>
                    <td><b>{{$dept->email}}</b></td>
                    <td><b>{{$dept->firstname}}</b></td>
                        <td>
                            <a style="float:left;" href="/admin/dept/edit/{{$dept->id}}" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs " data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>&nbsp;&nbsp;</a>
                            {!! Form::open(['action' => ['DepartmentController@destroy',$dept->id],'method'=>'DELETE']) !!}
                            <p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                {{ $depts->links() }}
              </div>
        </div>
    </div> 
   
</body>
</section>
@endsection