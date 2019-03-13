
<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('layouts.master')
@section('content')
<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <!-- Content Header (Page header) -->
    <section class="content-header text-left">
      <h4><i class="fa fa-tasks"></i>
        Requisition
      </h4>
    </section>
<div class="basic-form-area mg-tb-15">
    <div class="container-fluid">
    <div class="panel panel-default alert alert-info" role="alert">
    <div class="panel-body"><a href="info"><i class="fa fa-info-circle " style="font-size:15px"></i></a> On this page you can see your budgets. The top bar is the amount that you can budget. You can adjust that yourself by clicking on the amount. What you have actually spent is shown in the bar below. 
    Below that you will see every budget and what you have budgeted for it.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
  </div>
</div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-success" role="alert">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                      <div class="row">
                <div id="app" class="col-sm-4 pull-right">  
                    <button type="button" class="btn btn-success add-new" data-toggle="modal" data-target="#exampleModalCenter">Status..</button>
                </div>
                <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
               
            </div>
                        <section class="content-header text-center">
      <p>Send Your Expense Requisition
      </p>
    </section>   
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form id="myForm">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label  class="login2 pull-right pull-right-pro">Expense</label>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" id="expense" name="account" required>
                                                                @foreach($expenses as $expense)
                                                                <option value="{{$expense->account_name}}">{{$expense->account_name}}</option> 
                                                                @endforeach   
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                             <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label  class="login2 pull-right pull-right-pro">Purpose</label>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <textarea class="form-control"  name="purpose"  rows="3" id="purpose"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label  class="login2 pull-right pull-right-pro">Amount</label>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <div class="input-group">
                                                            <input name="amount" type="text" id="amount" class="form-control" placeholder="amount requested" required>
                                                            <span class="input-group-addon">.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                   <br/>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <button class="btn btn-sm btn-info" type="submit">Cancel</button>
                                                                <button class="btn btn-sm btn-success login-submit-cs" id="submit">Request</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!-- Basic Form End-->
</div>
<script src="{{asset('http://code.jquery.com/jquery-3.3.1.min.js')}}"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <script src="{{asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
<script>
 $('#submit').on('click', function(e) {
    e.preventDefault();
       var expense = $('#expense').val();
        var purpose= $('#purpose').val();
       var  amount=  $('#amount').val();
       $.ajax({
           type: "POST",
           url:'{{URL::to('users/request/send')}}',
           data: {expense:expense, purpose:purpose,amount:amount,_token: '{!! csrf_token() !!}'},
           success:function(data){
               $('#expense').val("");
                $('#purpose').val("");
                $('#amount').val("");
                 $("#submit").text(data)
        }
       });
   });
    
</script>
@endsection