@extends('task-management.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials.messages')

<section class="content">
       <!-- Modal -->
 <section class="content-header text-center">
      <h5>
        Nothing Assigned Yet
      </h5>
      <a href="javascript:history.back()" class="btn btn-default">Back</a>
    </section>
   
      @endsection