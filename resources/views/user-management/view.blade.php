@extends('user-management.base')
@section('action-content')
@include('partials.messages')
<section class="content">
        <div class="box">
    <div class="box-header">
      <div class="row"> 
            <h3 class="box-title">List of Users</h3>
<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Email</th>
                  <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">firstname</th>
                  <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">MiddleName</th>
                  <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Role</th>
                  <th tabindex="0" aria-controls="example2" rowspan="0" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                </tr>
              </thead>
              <tbody>
                   <div class="invisible"> {{$users = App\User::all()}}</div>
              @foreach ($users as $user)
                  <tr role="row" class="odd">
                    <td>{{ $user->email }}</td>
                    <td class="hidden-xs">{{ $user->firstname }}</td>
                    <td class="hidden-xs">{{ $user->middlename }}</td>
                    <td class="sorting_1">{{ $user->role }}</td>
                    <td>
                      <form class="row" method="POST" action="" onsubmit = "return confirm('Are you sure?')">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                          Update
                          </a>
                          @if (Auth::guard('admin')->check())
                           <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                            Delete
                          </button>
                          @endif
                      </form>
                    </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($users)}} of {{count($users)}} entries</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
             
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
        </div>
</section>
@endsection