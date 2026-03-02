@include('errors')

<h2>Skapa ny kategori</h2>
<form action="{{ route('categories.store')}}" method="POST">
    @csrf
    <label for="name">Namn</label>
    <input type="text" name="name" id="name">
    <button type="submit">Skapa</button>
</form>

<a href="{{ route('categories.index') }}">Go back</a>

