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
            <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>FirstName</th>
                        <th>MIddleName</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($users as $user)
                    <tr>       
                    <td>{{$user->email}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->middlename}}</td>
                    <td>{{$user->role}}</td>
                        <td>
                            <a href="/admin/user/edit/{{$user->id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            {!! Form::open(['action' => ['UserController@destroy',$user->id],'method'=>'DELETE']) !!}
                            <button class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
                            {!! Form::close() !!}
                          </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>     
</body>
</section>
@endsection