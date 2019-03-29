@extends('expense-accounts.base')
@section('action-content')
  @include('partials.messages')
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid alert alert-success" role="alert">
    <div class="row">
    <section class="content-header text-center">
    <p>This page shows you an overview of your created expense accounts. The top bar shows the amount that is available to be budgeted. 
    .<a href=""><i class="fa fa-info-circle" style="font-size:13px"></i></a><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
  
    </section>
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div style="width: auto !important;" class="panel-heading">
                <div class="row">
                  <div  class="col col-xs-6">
                    <h3 class="panel-title">Expense Accounts</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-success btn-create"><i class="fa fa-plus"></i>Create New</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table  class="table table-striped table-bordered table-list ">
                  <thead>
                    <tr>
                        <th ><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">ID</th>
                        <th>Account Name</th>
                        <th>Entry Code</th>
                        <th>Description</th>
                        <th>Status</th>
                         <th>Created by</th>
                        <th>Date Created</th>
                    </tr> 
                  </thead>
                  <tbody>
                  @foreach($accounts as $account)
                          <tr>
                            <td>
                                <a href="" style="float:left;" data-placement="top" data-toggle="tooltip" title="view"><button class="btn btn-primary btn-xs pull-right " data-title="view" data-toggle="modal" data-target="#view" ><span class="fa fa-eye"></span></button></a>
                               <a href="" style="float:center;" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs pull-right " data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a>
                              <a class="pt-2-half"><p style="float:right;" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs pull-right" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></a>
                            </td>
                            <td class="hidden-xs">{{$account->id}}</td>
                            <td>{{$account->account_name}}</td>
                            <td>{{$account->code}}</td>
                             <td>{{$account->account_description}}</td>
                             @if(App\Spendings::where('expense_name',$account->account_name)->first())
                              <td><button type="button" class="btn btn-primary btn-sm">active</button></td>
                              @else
                                <td><button type="button" class="btn btn-secondary btn-sm">inactive</button></td>
                                @endif
                               <td>{{$account->creator}}</td>
                             <td>{{$account->created_at}}</td>
                            
                          </tr>
                          @endforeach
                        </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                    <ul class="pagination hidden-xs pull-right">
                        {{ $accounts->links() }}
                    </ul>
                    <a href="javascript:history.back()" class="btn btn-default">Back</a>
                </div>
              </div>
            </div>

</div></div></div>
    @endsection