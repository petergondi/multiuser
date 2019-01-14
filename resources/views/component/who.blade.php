@if(Auth::guard('web')->check())
<p class="text-success">Logged in as <strong>USER <a href="/home"> User dashboard</a></strong></p>
@else
<p class="text-danger">Logged out as <strong>USER</strong></p> <a href="/login">User Login</a>
@endif
@if(Auth::guard('admin')->check())
<p class="text-success">Logged in as <strong>ADMIN <a href="/admin"> Admin dashboard</a></strong></p>
@else
<p class="text-danger">Logged Out as <strong>ADMIN</strong> <a href="/admin/login">Admin Login</a>
@endif
@if(Auth::guard('executives')->check())
<p class="text-success">Logged in as <strong>Executive <a href="/executive"> Executive dashboard</a></strong></p>
@else
<p class="text-danger">Logged Out as <strong>Executive</strong> <a href="/executive/login">Executive Login</a>
@endif

