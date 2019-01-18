@extends('dept-management.base')
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
                    <div class="col-sm-8"><h2>Department <b>Details</b></h2></div>
                    <div class="col-sm-4">
                            <a href="/admin/dept/create">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New Department</button>
                            </a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
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
                    <td>{{$dept->number}}</td>
                    <td>{{$dept->name}}</td>
                    <td>{{$dept->email}}</td>
                    <td>{{$dept->firstname}}</td>
                        <td>
                        <a href="/admin/dept/edit/{{$dept->id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            {!! Form::open(['action' => ['DepartmentController@destroy',$dept->id],'method'=>'DELETE']) !!}
                            <button class="delete alert alert-danger" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
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