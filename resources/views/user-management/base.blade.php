
@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">User Mangement</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->

@endsection