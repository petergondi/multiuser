@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="container-fluid alert alert-danger alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{$error}}</strong> 
  </div>
@endforeach
@endif

@if(session('success'))
 <div class="container-fluid alert alert-success alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('success')}}</strong> 
  </div>
@endif
@if(session('error'))
<div class="container-fluid alert alert-danger alert-dismissible ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> {{session('error')}}</strong> 
  </div>

@endif