@extends('layouts.app')

@section('title', 'Edit product')

@section('content')

<div class="bg-white p-6 rounded shadow-md m-4">

    <div class="flex items-center justify-between font-text my-4">
        <h2 class="p-3 text-xl font-bold font-text">Redigera produkt</h2>
        <a href="{{ route('products.index') }}" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Tillbaka till produkter</a>
    </div>

    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 font-text">
        @csrf
        @method('PATCH')

        <label for="name">Namn</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"">

        <label for="color">Färg</label>
        <input type="text" name="color" id="color" value="{{ old('color', $product->color) }}" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="material">Material</label>
        <input type="text" name="material" id="material" value="{{ old('material', $product->material) }}" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="description">Produkt beskrivning</label>
        <textarea name="description" id="description" rows="3" class="border border-gray-300 rounded-md py-2 px-4 overflow-y-auto focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>

        <label for="price">Pris</label>
        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <label for="category">Tilldela kategori</label>

        <select name="category_id" id="category" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="image">Bild</label>
        <input type="file" name="image" id="image" accept="image/jpg, image/webp, image/png, image/avif" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="validateImage()">

        <p id="image-error" style="color: red; display: none;"></p>

        @if($product->image)
            <p>Nuvarande bild: {{ basename($product->image) }}</p>
        @endif

        <button type="submit"class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">
            Uppdatera produkt
        </button>

    </form>

</div>
@endsection