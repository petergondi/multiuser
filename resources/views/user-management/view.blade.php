@extends('user-management.base')
@section('action-content')
@include('partials.messages')

<section class="content">
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
                    <div class="col-sm-8"><h2>User <b>Details</b></h2></div>
                    <div class="col-sm-4">
                            <a href="/admin/user/create">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New User</button>
                            </a>
                    </div>
                </div>
            </div>
            <table  class="table table-bordered">
                <thead >
                    <tr class="bg-primary" >
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
                    <td><b>{{$user->email}}</b></td>
                    <td><b>{{$user->firstname}}</b></td>
                    <td><b>{{$user->middlename}}</b></td>
                    <td><b>{{$user->role}}</b></td>
                        <td>
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