@if(Auth::guard('web')->check() && !Auth::guard('admin')->check() &&!Auth::guard('executives')->check())
<p><a class="text-success" href="/users/logout">Logout User</a></p>  
<p><a class="text-success" href="/admin/login">Admin Login</a></p> 
<p><a class="text-success" href="/executive/login">Executive Login</a></p> 
@elseif (Auth::guard('web')->check() && Auth::guard('admin')->check() && Auth::guard('executives')->check())
<a class="text-success" href="/admin/logout">Logout Admin Only</a> 
<a class="text-success" href="/executive/logout">Logout Executive Only</a>
<a class="text-success" href="/users/logout">Logout Admin Only</a>
@elseif(!Auth::guard('web')->check() && Auth::guard('admin')->check()) 
<a class="text-success" href="/admin/logout">Logout Admin Only</a>
@elseif(!Auth::guard('web')->check() && !Auth::guard('admin')->check()&& Auth::guard('executives')) 
<a class="text-success" href="/executive/logout">Logout Executive Only</a>
@elseif(Auth::guard('web')->check() && Auth::guard('executives')->check()&& !Auth::guard('admin')->check()) 
<a class="text-success" href="/executive/logout">Logout Executive Only</a>
<a class="text-success" href="/users/logout">Logout Users Only</a>
@endif
