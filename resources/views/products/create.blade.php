@extends('layouts.app')

@section('title', 'Create product')

@section('content')

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Namn</label>
    <input type="text" name="name" id="name">
    <label for="color">Färg</label>
    <input type="text" name="color" id="color">
    <label for="material">Material</label>
    <input type="text" name="material" id="material">
    <label for="description">Produkt beskrivning</label>
    <input type="text" name="description" id="description">
    <label for="price">Pris</label>
    <input type="number" name="price" id="price">
    <label for="category">Tilldela kategori</label>
    <select name="category_id" id="category">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/webp, image/png, image/avif">
    <p id="image-error" style="color: red; display: none;"></p>
    <button type="submit">Skapa produkt</button>
</form>

@endsection

@vite('resources/js/file-upload-validation.js')