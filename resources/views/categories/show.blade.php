@include('errors')

<h2>{{ $category->name }}</h2>

<p><a href="{{ route('categories.edit', ['category' => $category->id])}}">Redigera kategori</a></p>

<form method="POST" action={{ route('categories.destroy', ['category' => $category->id]) }}>
    @csrf
    @method('DELETE')
    <label for="button">Radera kategori</label>
    <button type="submit" onclick=" return confirm('Är du säker?')">Radera</button>
</form>

<a href="{{ route('categories.index') }}">Go back</a>

