@extends('layouts.app')

@section('title', 'Edit product')

@section('content')

<div class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">

    <section class="font-text flex flex-row items-center justify-between pb-6 pt-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Redigera produkt</h2>
            {{ Breadcrumbs::render('products.show', $product) }}
        </div>
        <a href="{{ route('products.index') }}" aria-label="Gå tillbaka till produkter" class="btn-primary">
            Tillbaka till produkter
        </a>
    </section>

    <section aria-label="Redigera kategori" class="font-text flex flex-col flex-wrap gap-3 bg-white rounded shadow-md p-4">
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data" aria-label="Redigera produkt-formulär" class="flex flex-col gap-4 font-text">
            @csrf
            @method('PATCH')
            <label for="name">
                Namn 
                <span class="text-red-600" aria-hidden="true">*</span>
            </label>
            <input type="text" name="name" id="name" min="3" max="50" value="{{ old('name', $product->name) }}" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"">
            <p class="text-sm text-gray-500 -mt-2">Mellan 3 och 50 tecken och måste vara unikt.</p>
        
            <label for="color">
                Färg 
                <span class="text-red-600" aria-hidden="true">*</span>
            </label>
                
            <input list="color-options" name="color" id="color" min="3" max="50" value="{{ old('color', $product->color) }}" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 -mt-2">Mellan 3 och 50 tecken.</p>
                <datalist id="color-options">
                    @foreach ($colors as $color)
                        <option value="{{ $color }}">
                    @endforeach
                </datalist>
        
                <label for="material">
                    Material 
                    <span class="text-red-600" aria-hidden="true">*</span>
                </label>
                <input list="material-options" name="material" id="material" min="2" max="50" value="{{ old('material', $product->material) }}" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 -mt-2">Mellan 2 och 50 tecken.</p>
                <datalist id="material-options">
                    @foreach ($materials as $material)
                        <option value="{{ $material }}">
                    @endforeach
                </datalist>
        
                <label for="description">
                    Produkt beskrivning 
                    <span class="text-red-600" aria-hidden="true">*</span>
                </label>
                <textarea name="description" id="description" rows="3" minlength="10" maxlength="300" required class="border border-gray-300 rounded-md py-2 px-4 overflow-y-auto focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
                <p class="text-sm text-gray-500 -mt-2">Mellan 10 och 300 tecken.</p>
        
                <label for="price">
                    Pris 
                    <span class="text-red-600" aria-hidden="true">*</span>
                </label>
                <input type="number" name="price" id="price" min="0" max="999999.99" step="0.01" inputmode="decimal" value="{{ old('price', $product->price) }}" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 -mt-2">Måste vara ett nummer och minst 0. Använd punkt för decimaler, till exempel 199.90.</p>
                <label for="category">
                    Tilldela kategori 
                    <span class="text-red-600" aria-hidden="true">*</span>
                </label>
        
                <select name="category_id" id="category" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 -mt-2">Välj en befintlig kategori.</p>
        
                <label for="image">Bild</label>
                <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/webp, image/png, image/avif" class="text-white bg-slate-500 border border-gray-300 hover:bg-slate-800 rounded-md py-2 px-4 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="validateImage()">
                <p class="text-sm text-gray-500 -mt-2">Valfri. Tillåtna format: JPEG, PNG, WebP eller AVIF. Max 2 MB.</p>
        
                <p id="image-error" role="alert" aria-live="polite" style="color: red; display: none;"></p>
        
                @if($product->image)
                    <p>Nuvarande bild: {{ basename($product->image) }}</p>
                @endif
        
                <button type="submit" aria-label="Uppdatera produkt" class="bg-slate-700 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <strong>Uppdatera produkt</strong>
                </button>
        
            </form>
    </div>

</div>
@endsection