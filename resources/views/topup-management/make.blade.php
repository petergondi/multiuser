@extends('topup-management.base')
@section('action-content')

  <!-- Mobile Menu end -->
<!-- Basic Form Start -->

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
                        <section class="content-header text-center">
      <p>Make top up
      </p>
    </section>
                    <p  class="pull-right" id="balance">Balance: ksh.{{$balance}}</p>
                    <p  class="pull-right" id="bal"></p>
                      
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
                                                        <label  class="login2 pull-right pull-right-pro">Top Up</label>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" id="account" name="account" required>
                                                                <option value="">select top up type</option>    
                                                                <option value="mpesa">Mpesa</option>
                                                                <option value="bank">Bank</option>
                                                                <option value="cash">Cash</option>
                                                                </select>
                                                        </div>
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
                                                            <input name="topup" type="text" id="topup" class="form-control" required>
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
                                                                <button class="btn btn-sm btn-success login-submit-cs" id="submit">Top Up</button>
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

<script>
 $('#submit').on('click', function(e) {
    e.preventDefault();
       var account = $('#account').val();
       var topup = $('#topup').val();
       $.ajax({
           type: "POST",
           url:'{{URL::to('admin/topup/make')}}',
           data: {account:account, topup:topup,_token: '{!! csrf_token() !!}'},
           success:function(data){
            if(!($("#account").val().length||$("#topup").val().length)== 0){
            document.getElementById('bal').innerHTML += 'Balance: ksh.';
            $('#balance').text(data);
            $('#account').val("");
            $('#topup').val("");
             $('#amount').text(data);
          
        }
        }
       });
   });
</script>
@endsection
