@include('errors')

<h2>Redigera kategori</h2>
<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <label for="name">Uppdatera kategori</label>
    <input type="text" value="{{ $category->name }}" name="name" id="name">
    <button type="submit">Uppdatera</button>
</form>

<a href="{{ route('categories.index') }}">Go back</a>

