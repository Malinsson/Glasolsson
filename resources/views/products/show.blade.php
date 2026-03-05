@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')
    
<a href="{{ route('products.index') }}"><- Tillbaka</a> 

<section class="flex flex-col flex-wrap gap-3 m-4">

    <p>Id: {{$product->id}}</p>
    <h2 class="text-2xl">{{$product->name}}</h2> 
    <p>Material: {{$product->material}}</p>
    <p>Färg: {{$product->color}}</p>
    <p>Pris: {{$product->price}} kr</p>
    <p>Kategori: {{$product->category->name}}</p>
    <img src="{{ str_starts_with($product->image, 'images/stock/') ? asset($product->image) : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover">
    <p>{{$product->description}}</p>

</section>

<div class="flex flex-row justify-between gap-3 m-8">
    <a href="{{ route('products.edit', $product->id) }}" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Redigera produkt</a>

    <a href="{{ route('products.destroy', $product->id) }}" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded cursor-pointer" onclick="event.preventDefault(); if(confirm('Är du säker på att du vill ta bort denna produkt?')) { document.getElementById('delete-form').submit(); }">Ta bort produkt</a>

</div>

@endsection