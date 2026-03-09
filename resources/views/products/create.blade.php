@extends('layouts.app')

@section('title', 'Skapa produkt')

@section('content')

<div class="flex items-center justify-between font-text my-4">
    <h2 class="p-3 text-xl font-bold font-text">Skapa ny produkt</h2>
    <a href="{{ route('products.index') }}" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Tillbaka till produkter</a>
</div>

<div class="bg-white p-6 rounded shadow-md m-4">

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 font-text">
        @csrf
        <label for="name">Namn</label>
        <input type="text" name="name" id="name" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="color">Färg</label>
        <input type="text" name="color" id="color" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="material">Material</label>
        <input type="text" name="material" id="material" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="description">Produkt beskrivning</label>
        <input type="text" name="description" id="description" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="price">Pris</label>
        <input type="number" name="price" id="price" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="category">Tilldela kategori</label>
        <select name="category_id" id="category" class="border border-gray-300 rounded-md py-2 px-4 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">

            @foreach ($categories as $category)
                <option value="{{ $category->id }}" class="py-2 px-4">{{ $category->name }}</option>
            @endforeach

        </select>

        <label for="image">Produktbild</label>
        <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/webp, image/png, image/avif" class="border border-gray-300 rounded-md py-2 px-4 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="validateImage()">

        <p id="image-error" style="color: red; display: none;"></p>

        <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">
            Skapa produkt
        </button>
    </form>
    
</div>

@endsection