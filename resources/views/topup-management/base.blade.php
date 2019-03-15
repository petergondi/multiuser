@extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{('http://code.jquery.com/jquery-3.3.1.min.js')}}">
      </script>
      <script src="{{asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header text-left">
      <h4><i class="fa fa-money bg-success"></i>
        Top Up Management
      </h4>
    </section>
    @yield('action-content')
    <!-- /.content -->
@endsection