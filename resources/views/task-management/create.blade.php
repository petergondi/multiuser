@extends('task-management.base')
@section('action-content')
@include('partials.messages')
<!-- result modal-->
<div class="modal fade" id="customer_result" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Search Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="result"></p>
        <p id="contac"></p>
        <p id="emai"></p>
        <p id="locat"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- endresult -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="customer">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone No:</label>
            <input type="text" class="form-control" id="customer_phone">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="customer_email">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Location:</label>
            <input type="text" class="form-control" id="customer_location">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="add" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid alert alert-success" role="alert">
    <div class="row">
    <div class="panel panel-default">
    <div class="panel-body"><a href="info"><i class="fa fa-info-circle " style="font-size:15px"></i></a>On this page you can see your budgets. The top bar is the amount that you can budget. You can adjust that yourself by clicking on the amount. What you have actually spent is shown in the bar below. 
    Below that you will see every budget and what you have budgeted for it.</div>
  </div>
</div>
 <div class="header-right">
            <div action="pages-search-results.html" class="search nav-form col-md-8 col-md-offset-2">
                <div class="input-group input-search">
                    <input type="text" class="form-control" name="q" id="customer_search" placeholder="Search Customer using email or contact...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="search" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
                    </div>
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading bg-success ">Assign Duty/Task 
                
                </div>
                {!! Form::open(['action' => 'TaskController@storeTask','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}
                <div class="panel-body">
                                       <div class="form-group{{ $errors->has('medium') ? ' has-error' : '' }}">
                                        <label for="customer_name" class="col-md-4 control-label">Engagement Medium</button></label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="medium" id="medium">
                                                    <option value="" selected>Select Type</option>
                                                    <option value="call">Call</option>
                                                    <option value="text">Text</option>
                                                    <option value="email">Email</option>
                                                    <option value="contact-form">Contact Form</option>
                                                    <option value="online-chat">Online Chat</option>
                                                    <option value="walk-in">Walk-in</option>
                                                  </select>
                                            @if ($errors->has('customer_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('medium') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                                        <label for="customer_name" class="col-md-4 control-label">Reason</button></label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="reason" id="reason">
                                                    <option value="" selected>Choose</option>
                                                    <option value="task">Task</option>
                                                    <option value="meeting">Meeting</option>
                                                    <option value="enquiry">Enquiry</option>
                                                    <option value="quotation">Quotation</option>
                                                    <option value="invoice">Invoice</option>
                                                  </select>
                                            @if ($errors->has('customer_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('reason') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                        <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                            <label for="task_name" class="col-md-4 control-label">Header</label>

                            <div class="col-md-6">
                                <input id="header" type="text" class="form-control" name="task_name" value="{{ old('task_name') }}" required autofocus>

                                @if ($errors->has('task_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="description" id="comment"  value="{{ old('description') }}" required></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Customer<button data-toggle="modal" data-target="#exampleModal" title="new Customer" class="btn btn-sm"><i class="fa fa-plus"></i></button></label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}" >

                                @if ($errors->has('customer_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" >

                                @if ($errors->has('Location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                <label for="contact" class="col-md-4 control-label">Customer Contact</label>
    
                                <div class="col-md-6">
                                    <input id="contact" type="tel" class="form-control" name="contact" value="{{ old('contact') }}" >
    
                                    @if ($errors->has('contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Customer email</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" >
        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('asignee_name') ? ' has-error' : '' }}">
                                        <label for="asignee_name" class="col-md-4 control-label">Assignee</label>
            
                                        <div class="col-md-6">
                                            <select class="form-control" name="asignee_id" id="assignee">
                                                    <option value="" selected>Select Assignee</option>
                                                    @foreach($assignees as $assignee)
                                            <option value="{{$assignee->id}}">{{$assignee->firstname}}</option>
                                                    @endforeach
                                                  </select>
                                            @if ($errors->has('asignee_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('asignee_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Assign
                                </button>
                            </div>
                              {!! Form::close() !!}
                        <a href="javascript:history.back()" class="btn btn-default">Back</a>
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
$("#customer_name").change(function () {
    var id = $(this).val();
    if(id.length==0){
             var contactTextBox = document.getElementById("contact");
       contactTextBox.value = "";
         var locationTextBox = document.getElementById("location");
        locationTextBox.value = "";
         var emailTextBox = document.getElementById("email");
         emailTextBox.value = "";  
    }
    else{
$.ajax({
           type: "POST",
           url:"/admin/task/assign/"+id,
           data: {customer:id,_token: '{!! csrf_token() !!}'},
           success:function(data){
          var contactTextBox = document.getElementById("contact");
       contactTextBox.value = data.contact;
         var locationTextBox = document.getElementById("location");
        locationTextBox.value = data.location;
         var emailTextBox = document.getElementById("email");
         emailTextBox.value = data.email;
        },
         

       });
    }
    
});
$('#add').on('click',function(){
        var name=$('#customer').val();
        var email=$('#customer_email').val();
        var phone=$('#customer_phone').val();
         var location=$('#customer_location').val();
 $.ajax({
           type: "POST",
           url:'{{URL::to('admin/customer/add')}}',
           data: {name:name, location:location,email:email,phone:phone,_token: '{!! csrf_token() !!}'},
           success:function(data){
                $('#customer').val("");
           $('#customer_location').val("");
           $('#customer_email').val("");
           $('#customer_phone').val("");
           setTimeout(function() {
      $('#exampleModal').modal('hide');
    }, 4000); 
  }
   });
          
       
         });
         //search customer
          $('#search').on('click',function(){
         
        $value=$('#customer_search').val();
         
        $.ajax({
         
        type : 'get',
         
        url : '{{URL::to('admin/customers/search')}}',
         
        data:{'search':$value,_token: '{!! csrf_token() !!}'},
         
        success:function(data){
         
        var customers_name=data.name;
        var contact=data.contact;
        var email=data.email;
        var location=data.location;
         $('#contac').text(contact);
          $('#emai').text(email);
           $('#locat').text(location);
            $('#result').text(customers_name);
        //$('#customer_result').modal('show');
         var contactTextBox = document.getElementById("customer_name");
       contactTextBox.value = data.name;
         var contactTextBox = document.getElementById("contact");
       contactTextBox.value = data.contact;
         var locationTextBox = document.getElementById("location");
        locationTextBox.value = data.location;
         var emailTextBox = document.getElementById("email");
         emailTextBox.value = data.email;
       }
    //   error: function (data) {
    // $('#customer_result').modal('show');
    //   }
        }); 
        
        
    });
   

</script>
@endsection