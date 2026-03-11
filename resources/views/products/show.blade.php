@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')
    
<section aria-label="Produktinformation" class="font-text flex flex-col gap-3 p-4 mt-12 w-full md:flex-row md:gap-6">

    <div class="w-full md:w-1/2 flex flex-col gap-3">
        <p>Id: {{$product->id}}</p>
        <h2 class="text-2xl">{{$product->name}}</h2> 
        <strong class=" md:text-xl">Material:</strong>
        <p>{{$product->material}}</p>
        <strong class="md:text-xl">Färg:</strong>
        <p>{{$product->color}}</p>
        <strong class="md:text-xl">Pris:</strong>
        <p>{{$product->price}} kr</p>
        <strong class="md:text-xl">Kategori:</strong>
        <p>{{ $product->category?->name ?? 'Ingen kategori' }}</p>
    </div>

    <div class="md:w-1/2 flex flex-col gap-3">
        <strong class="md:text-xl">Produktbild:</strong>
        <img src="{{ str_starts_with($product->image, 'images/stock/') ? asset($product->image) : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class=" object-cover">
        <strong class="md:text-xl">Beskrivning:</strong>
        <p>{{$product->description}}</p>
    </div>

</section>

<div class="flex flex-row justify-between gap-3 m-8 md:justify-start">
    <a href="{{ route('products.edit', $product->id) }}" aria-label="Redigera produkt" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Redigera produkt</strong></a>

    <form id="delete-form" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display:inline;">
        @method('DELETE')
        @csrf
        <button id="open-delete-modal" type="button" aria-label="Radera produkt" class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Radera produkt</strong></button>
    </form>

</div>

@endsection