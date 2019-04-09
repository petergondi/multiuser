 @extends('expenditure-management.base')
@section('action-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
	.table-wrapper {
        background: #fff;
        padding: 20px;
        margin: 30px 0;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
    }
    .search-box {
        position: relative;        
        float: right;
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
	.search-box input:focus {
		border-color: #3FBAE4;
	}
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: auto;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
	table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
    .pagination {
        float: center;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
        margin-left:20px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }    
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header alert alert-success" role="alert">
        <h5 class="modal-title" id="exampleModalLabel">Export Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-inline">
  <div class="form-group col-3">
     <label for="staticEmail2">From</label>
    <input type="text" class="form-control" name="date" id="date" placeholder="yy/mm/dd">
  </div>
  <div class="form-group col-3">
     <label for="staticEmail2">To</label>
    <input type="text" class="form-control" name="date1" id="date1" placeholder="yy/mm/dd">
  </div>
   <div class="form-group col-3">
     <label for="staticEmail2">File type</label>
    <select class="form-control-sm">
  <option value="" selected="selected">Select</option>
  <option value="2">PDF</option>
  <option value="3">EXCEL</option>
</select>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
      <a href="{{route('admin.pdf.download')}}"><button type="button" id="export" class="btn  btn-sm btn-primary"><i class="fa fa-download"></i>Save</button></a>
      </div>
    </div>
  </div>
</div>
<!--endmodal-->
 <!-- Content Header (Page header) --> 
<div class="container-fluid alert alert-success" role="alert">
    <div class="row">
    <section class="content-header text-center">
    <p>This page shows you an overview of your created expense accounts. The top bar shows the amount that is available to be budgeted. 
    .<a href=""><i class="fa fa-info-circle" style="font-size:13px"></i></a></p>
    <div class="col col-xs-6 pull-right">
            <button type="button" class="btn btn-sm btn-success btn-create"><i class="fa fa-plus"></i>Add New Expense</button>
        </div>
    </section>
    <div class="container-fluid">
        <div  class="table-wrapper">
            <div class="table-title">
                <div  class="row">
                    <div class="col-sm-8"><h4><b>Expenses Details</b></h4>  <div class="col col-xs-6 pull-left">
                    <button type="button" class="btn btn-sm btn-default btn-create" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file"></i>Export</button>
                  </div></div>
                    <div style="width: auto !important;" class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" id="search" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                       
                        <th>Expense<i class="fa fa-sort"></i></th>
                        <th>Date</th>
                         <th>Person</th>
                        <th>Purpose</th>
                        <th>Amount<i class="fa fa-sort"></i></th>
                        <th>Balance<i class="fa fa-sort"></i></th>
                        <th>Deleted<i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($spendings as $spending)
                        <td>{{$spending->expense_name}}</td>
                        <td>{{$spending->created_at}}</td>
                        <td>{{$spending->person_given}}</td>
                        <td>{{$spending->purpose}}</td>
                        <td>{{$spending->expense_amount}}</td>
                        <td>{{$spending->closing_balance}}</td>
                        <td id="del">{{$expense_offset}}</td>
                        <td>
							<button href="#" class="view alert-info" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></button>
                            <button href="#" class="delete alert-danger" id="delete" data-id="{{$spending->id}}" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
                        </td>
                    </tr>
                    @endforeach 
                    <tr class="bg-success">
                   
                    <td>Balance:</td>
                    <td id="balance">{{$balance}}</td>
                    </tr>
                    <tr class="bg-success">
                    <td>Total expense:</td>
                    <td id="expense">{{$total_expense}}</td>
                    </tr>
                    <tr class="bg-success">
                    <td>Last Topup:</td>
                    <td>Amount:{{$last_topup->topup}} </td>
                    </tr>
                    <tr class="bg-success">
                    <td>Offset:</td>
                    <td>{{$sum}}</td>
                    </tr>
                </tbody>
            </table>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-default">Back</a>
    </div>    
    </div>
   

    <script type="text/javascript">
    $(document).ready(function() {
        $('#search').on('keyup',function(){
         
        $value=$(this).val();
        $select=$('#inputtype').val();
         
        $.ajax({
         
        type : 'get',
         
        url : '{{URL::to('admin/spending/view')}}',
         
        data:{'search':$value, 'select':$select},
         
        success:function(data){
         
        $('tbody').html(data);
}
         
        })
         
        }); 
        
        
    });
        $(".delete").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var tr = $(this).closest('tr');
        var confirmation = confirm("are you sure you want to delete? Deleting this record would interfere with your other records");
        //if ( confirm("Do you want to Delete?")) {
    // If you pressed OK!";
     if (confirmation) {

        $.ajax(
        {
            url: "/admin/spending/delete/"+id,
            type: 'DELETE',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function (data)
          {
               $('#del').text(data.deleted);
                $('#balance').text(data.bal);
                 $('#expense').text(data.total_expenses);
                tr.fadeOut(1000, function(){
                        $(this).remove();
                    });
            },
        });
         }
        else{
            return false;
        } 
    });
      var options={
            format: 'mm/dd/yyyy',
            todayHighlight: true,
            autoclose: true,
          orientation: 'top auto'
        };

    $('#date').datepicker(options);
    $('#date1').datepicker(options);
    //$('#export').on('click', function(e) {
    //e.preventDefault();
    //   var from = $('#date').val();
    //   var to = $('#date1').val();
    //   $.ajax({
    //       type: "get",
    //       url:'{{URL::to('admin/pdf/download')}}',
    //       data: {from:from, to:to,_token: '{!! csrf_token() !!}'},
    //       success:function(data){
    //     console.log("downloaded")
    //    }
    //    });
    //   });
  </script>
         
        <script type="text/javascript">
         
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
         
    </script>
    @endsection