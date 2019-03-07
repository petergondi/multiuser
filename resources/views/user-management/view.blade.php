@extends('user-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
    <section class="content">
       
    <div class="container-fluid alert alert-success" role="alert">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                <section class="content-header text-left">
    <p> <i class="fa fa-arrow-left"></i>This page shows you an overview of your created expense accounts. The top bar shows the amount that is available to be budgeted. 
    .<a href=""><i class="fa fa-info-circle" style="font-size:13px"></i></a><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </section>
                    <div class="col-sm-8"><p><strong>User Details</strong></p></div>
                    <div class="col-sm-4">
                            <a href="/admin/user/create">
                        <button type="button" class="btn btn-success add-new"><i class="fa fa-plus"></i> Add New User</button>
                            </a>
                           
                    </div>
                </div>
                 <br/>
            </div>
            <table  class="table table-bordered container-fluid">
                <thead >
                    <tr class="bg-primary" >
                        <th >No</th>
                        <th >Date</th>
                        <th >Email</th>
                        <th>FirstName</th>
                        <th>MIddleName</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($users as $user)
                    <tr >       
                    <td><b>{{$user->id}}</b></td>
                    <td><b>{{$user->created_at->format('d/m/Y')}}</b></td>
                    <td><b>{{$user->email}}</b></td>
                    <td><b>{{$user->firstname}}</b></td>
                    <td><b>{{$user->middlename}}</b></td>
                    <td><b>{{$user->role}}</b></td>
                        <td>
                         <a style="float:left;" href="/admin/user/edit/{{$user->id}}" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-success btn-xs " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button>&nbsp;&nbsp; </a>
                                <a style="float:left;" href="/admin/user/edit/{{$user->id}}" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs " data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>&nbsp;&nbsp; </a>
                                {!! Form::open(['action' => ['UserController@destroy',$user->id],'method'=>'DELETE']) !!}
                                <p style="float:left;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                {!! Form::close() !!}
                          </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                {{ $users->links() }}
              </div>
        </div>
    </div>     
</body>
</section>
@endsection