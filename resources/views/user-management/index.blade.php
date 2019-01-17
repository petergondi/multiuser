@extends('user-management.base')
@section('action-content')
<section class="content">
</section>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Signed As:</div>
                    <div class="panel-body">
@component('component.who')
@endcomponent
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection