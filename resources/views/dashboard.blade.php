@extends('layouts.app')

@section('title', 'Dashboard - Glas Olsson')

@section('content')


<p>Hello, {{ auth()->user()->name }}</p>

<hr>
<a href="/logout">Logout</a>

<a href="/products">Products</a>
<a href="/categories">Categories</a>
@endsection
