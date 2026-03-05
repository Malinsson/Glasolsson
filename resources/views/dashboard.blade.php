@extends('layouts.app')

@section('title', 'Dashboard - Glas Olsson')

@section('content')


<p>Hello, {{ auth()->user()->name }}</p>

<hr>
<a href="/logout">Logout</a>

<a href="/products">Produkter</a>
<a href="/categories">Kategorier</a>
@endsection
