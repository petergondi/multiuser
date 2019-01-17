@if(Auth::guard('web')->check())
<ul class="list-group">
    <li class="list-group-item">Logged in as <strong>USER <a href="/home"> User dashboard</a></strong>
    </li>
</ul>
@else
<ul class="list-group">
        <li class="list-group-item">Logged out as <strong>USER <a href="/home"> User Login</a></strong>
        </li>
    </ul>

@endif
@if(Auth::guard('admin')->check())
<ul class="list-group">
        <li class="list-group-item">Logged in as <strong>Admin <a href="/admin">Admin dashboard</a></strong>
        </li>
    </ul>

@else
<ul class="list-group">
        <li class="list-group-item">Logged Out as <strong>Admin <a href="/admin/login">Admin Login</a></strong>
        </li>
    </ul>
@endif
@if(Auth::guard('executives')->check())
<ul class="list-group">
        <li class="list-group-item">Logged In as <strong>Executive <a href="/executive">Executive Dashboard</a></strong>
        </li>
    </ul>
@else
<ul class="list-group">
        <li class="list-group-item">Logged Out as <strong>Executive <a href="/executive/login">Admin Login</a></strong>
        </li>
    </ul>
@endif

