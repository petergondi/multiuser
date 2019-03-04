@extends('expenditure-management.base')
@section('action-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Mobile Menu end -->
<!-- Basic Form Start -->
<div class="basic-form-area mg-tb-15">
<div class="container-fluid alert alert-success" role="alert"">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
            
                    <div class="col-sm-4 pull-right">
                            <a href="{{ route('admin.account.create') }}">
                        <button type="button" class="btn btn-success add-new "><i class="fa fa-plus"></i> Add  Account New Expense</button>
                            </a>
                    </div>
                <div class="sparkline12-hd">
                        <div  class="main-sparkline12-hd">
                        <p>Date: {{$now}}</p>
                        <div class="col-sm-1 bg-primary" style="color:white;border-radius:10px;">{{$weekday}}</div>
                            </div>
                            <br/><br/>
                    <div  class="main-sparkline12-hd">
                        <p>Record Todays Expenditure</p>
                    </div>
                    <div  class="main-sparkline12-hd">
                        <p class="pull-left">Opening Balance: {{$balance}}</p>
                         <p class="pull-right" id="rel">Closing Balance:</p>
                        <p id="result"><span id="rel"><span></p>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="all-form-element-inner">
                                    {!! Form::open(['action' => 'SpendingsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    {{ csrf_field() }}
                                      
                                     
                                            <table id="myTable" class="table table-condensed table-bordered table order-list">
                                            
                                                <tr>
                                                    <td><strong>Expense</strong></td>
                                                    <td><strong>Purpose</strong></td>
                                                    <td><strong>Person Given</strong></td>
                                                     <td style="text-align:center;"><strong>VAT</strong></td>
                                                    <td><strong>Amount</strong></td>
                                                     <td><strong>Action</strong></td>
                                                </tr>
                                          
                                          
                                                <tr>
                                            <td class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                        <select class="form-control custom-select-value" name="account[]" required>
                                                            <option value="">expense type</option> 
                                                            @foreach($expense_accounts as $expense_account)
                                                        <option value="{{$expense_account->account_name}}">{{$expense_account->account_name}}</option> 
                                                            @endforeach   
                                                            </select>
                                                 
                                                </td>
                                                    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                        <input type="text" name="purpose[]"  class="form-control" required/>
                                                    </td>
                                                     <td class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                        <select class="form-control custom-select-value" name="person[]" required>
                                                            <option value="">Person Given</option> 
                                                            @foreach($persons as $person)
                                                        <option value="{{$person->firstname}}">{{$person->firstname}}</option> 
                                                            @endforeach   
                                                            </select>
                                                </td>
                                                    <td  class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                           <div style="text-align:center;" class="form-check">
                                                     <input class="form-check-input input-sm" name="vat[]" type="checkbox" value="" id="defaultCheck1">
                                                       
                                                     </div>
                                                    </td>
                                                    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                            <div class="input-group">
                                                        <input type="text" name="amount[]" id="qty" class="form-control input-sm" required/>
                                                        <span class="input-group-addon">.00</span>
                                                            </div>
                                                    </td>
                                                  <td class="col-lg-1 col-md-1 col-sm-1 col-xs-12 input-sm">
                                                     <button data-toggle="tooltip" title="Trash"  class="pd-setting-ed"><i class="ibtnDel btn btn-md btn-danger fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" style="text-align: left;">
                                                        <input type="button" class="btn btn-lg btn-block bg-primary " id="addrow" value="Add New Expense" required/>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                       
                                        <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-9">
                                                        <div class="login-horizental cancel-wp pull-left">
                                                            <button class="btn btn-sm btn-info" type="submit">Cancel</button>
                                                            <button class="btn btn-sm btn-primary login-submit-cs" id="submit" type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

<script>
      
    
$(document).ready(function () {
    var counter = 0;
    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols +='<td> <select class="form-control custom-select-value"  name="account[]" required><option value="">expense type</option> @foreach($expense_accounts as $expense_account)  <option value="{{$expense_account->account_name}}">{{$expense_account->account_name}}</option>@endforeach </select></td>';                                                                                                                                                                                                            
        cols += '<td><input type="text" class="form-control"name="purpose[]" required/></td>';
     cols +='<td> <select class="form-control custom-select-value"  name="person[]" required><option value="">Person Given</option> @foreach($persons as $person)  <option value="{{$person->firstname}}">{{$person->firstname}}</option>@endforeach </select></td>';
        cols +='<td> <div style="text-align:center;" class="form-check"><input class="form-check-input" name="vat[]" type="checkbox" value="" id="vat"></div></td>';
        cols += '<td> <div class="input-group"><input type="text" class="form-control" id="qty" name="amount[]"/><span class="input-group-addon" required>.00</span></div></td>';
        cols += ' <td class="col-lg-1 col-md-1 col-sm-1 col-xs-12 input-sm"><button data-toggle="tooltip" title="Trash"  class="pd-setting-ed"><i class="ibtnDel btn btn-md btn-danger fa fa-trash-o" aria-hidden="true"></i></button> </td>';
                                                   
                                                     
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
   


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}


$('#qty').on('keyup',function(){
            $.get("{{URL::to('spend/create')}}",function(data){
             var balance=data;
            
             if($("#qty").val().length == 0){
                 $('#result').text(balance);
                 $('#rel').text(bal);
             }
             else{
                var sum = 0;
                $('#qty').each(function() {
        sum += Number($(this).val());
    });
   
             $('#result').text(parseInt(balance)-(sum));
             }
            
            })
       
})

$.get("{{URL::to('spend/create')}}",function(data){     
    var balance=data;
   $('#result').text(balance);
})
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
//$("#submit").on("click", function () {
//      event.preventDefault();
//   $.ajax({
//      type:"post",
//      url:"{{url('spending/create') }}",
//      data:$(this).serialize(),
//      success: function(data){
//         alert("Data Save: " + data);
//      }
//   });
//   })
   

</script>
</div>
@endsection