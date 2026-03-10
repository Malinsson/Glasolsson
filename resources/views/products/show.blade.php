@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')
    
<section class="font-text flex flex-col gap-3 p-4 mt-12 w-full md:flex-row md:gap-6">

    <div class="w-full md:w-1/2 flex flex-col gap-3">
        <p>Id: {{$product->id}}</p>
        <h2 class="text-2xl">{{$product->name}}</h2> 
        <p class="font-bold md:text-xl">Material:</p>
        <p>{{$product->material}}</p>
        <p class="font-bold md:text-xl">Färg:</p>
        <p>{{$product->color}}</p>
        <p class="font-bold md:text-xl">Pris:</p>
        <p>{{$product->price}} kr</p>
        <p class="font-bold md:text-xl">Kategori:</p>
        <p>{{ $product->category?->name ?? 'Ingen kategori' }}</p>
    </div>

    <div class="md:w-1/2 flex flex-col gap-3">
        <p class="font-bold md:text-xl">Produktbild:</p>
        <img src="{{ str_starts_with($product->image, 'images/stock/') ? asset($product->image) : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class=" object-cover">
        <p class="font-bold md:text-xl">Beskrivning:</p>
        <p>{{$product->description}}</p>
    </div>

</section>

<div class="flex flex-row justify-between gap-3 m-8 md:justify-start">
    <a href="{{ route('products.edit', $product->id) }}" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Redigera produkt</a>

    <form id="delete-form" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display:inline;">
        @method('DELETE')
        @csrf
        <button id="open-delete-modal" type="button" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Radera produkt</button>
    </form>

</div>

@endsection