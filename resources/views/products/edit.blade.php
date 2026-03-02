@include('errors')

<form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <label for="name">Namn</label>
    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
    <label for="color">Färg</label>
    <input type="text" name="color" id="color" value="{{ old('color', $product->color) }}">
    <label for="material">Material</label>
    <input type="text" name="material" id="material" value="{{ old('material', $product->material) }}">
    <label for="description">Produkt beskrivning</label>
    <input type="text" name="description" id="description" value="{{ old('description', $product->description) }}">
    <label for="price">Pris</label>
    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}">
    <label for="category">Tilldela kategori</label>
    <select name="category_id" id="category">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Uppdatera produkt</button>
</form>