@extends('layouts.app')

@section('title', 'Dashboard - Glas Olsson')

@section('content')

<div class="h-24 bg-slate-800"></div>

<p>Hello, {{ auth()->user()->name }}</p>

<hr>
<a href="/logout">Logout</a>

@endsection
