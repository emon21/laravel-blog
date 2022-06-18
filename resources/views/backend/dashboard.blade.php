@if (Session('success'))
    <span class="alert alert-success">{{ Session('success') }}</span>
@endif
<h2>Dashboard Page</h2>
Hi ,
{{ Auth::user()->name }}


<a href="{{ route('admin.logout') }}"> Logout</a>
