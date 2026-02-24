@include('errors')
<p>Hello, {{ auth()->user()->name }}</p>

<hr>
<a href="/logout">Logout</a>