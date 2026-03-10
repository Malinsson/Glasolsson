@extends('layouts.app')

@section('title', 'Skapa produkt')

@section('content')

<div class="flex items-center justify-between font-text my-4">
    <h2 class="p-3 text-xl font-text"><strong>Skapa ny produkt</strong></h2>
    <a href="{{ route('products.index') }}" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Tillbaka till produkter</strong></a>
</div>

<div class="bg-white p-6 rounded shadow-md m-4">

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 font-text">
        @csrf
        <label for="name">Namn <span class="text-red-600" aria-hidden="true">*</span></label>
        <input type="text" name="name" id="name" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="color">Färg <span class="text-red-600" aria-hidden="true">*</span></label>
        <input type="text" name="color" id="color" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="material">Material <span class="text-red-600" aria-hidden="true">*</span></label>
        <input type="text" name="material" id="material" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="description">Produkt beskrivning <span class="text-red-600" aria-hidden="true">*</span></label>
        <textarea name="description" id="description" rows="3" required class="border border-gray-300 rounded-md py-2 px-4 overflow-y-auto focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

        <label for="price">Pris <span class="text-red-600" aria-hidden="true">*</span></label>
        <input type="number" name="price" id="price" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label for="category">Tilldela kategori <span class="text-red-600" aria-hidden="true">*</span></label>
        <select name="category_id" id="category" required class="border border-gray-300 rounded-md py-2 px-4 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">

            @foreach ($categories as $category)
                <option value="{{ $category->id }}" class="py-2 px-4">{{ $category->name }}</option>
            @endforeach

        </select>

        <label for="image">Produktbild</label>
        <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/webp, image/png, image/avif" class="border border-gray-300 rounded-md py-2 px-4 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="validateImage()">

        <p id="image-error" style="color: red; display: none;"></p>

        <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white py-2 px-4 rounded">
            <strong>Skapa produkt</strong>
        </button>
    </form>
    
</div>

@endsection