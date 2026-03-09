@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')
    
<a href="{{ route('products.index') }}"><- Tillbaka</a> 

<h2 class="text-2xl">{{$product->name}}</h2> 
<section class="flex flex-row flex-wrap gap-3">
    <p>Id: {{$product->id}}</p>
    <p>Material: {{$product->material}}</p>
    <p>Färg: {{$product->color}}</p>
    <p>Pris: {{$product->price}} kr</p>
</section>
<p>{{$product->description}}</p>

@endsection